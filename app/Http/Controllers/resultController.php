<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ResultController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()->isAdmin() || auth()->user()->isStaff()) {
            $subjectId = $request->input('subject'); 
            $results = Result::when($subjectId, function ($query) use ($subjectId) {
                $query->whereHas('assessment', function ($subQuery) use ($subjectId) {
                    $subQuery->where('subject_id', $subjectId);
                });
            })->with('user', 'assessment', 'assessment.subject')->get();
            $subjects = Subject::all(); 
            return view('results.index', compact('results', 'subjects'));
        } else {
            $results = Result::where('user_id', auth()->user()->id)
                ->with('assessment', 'assessment.subject')
                ->get();
            return view('results.index', compact('results'));
        }
    }

    public function showBySubject($subjectId)
    {
        // Ensure the authenticated user is a student
        if (!auth()->user()->isStudent()) {
            abort(403, 'Unauthorized'); 
        }

        $subject = Subject::findOrFail($subjectId); 

        $results = Result::where('user_id', auth()->user()->id)
            ->whereHas('assessment', function ($query) use ($subjectId) {
                $query->where('subject_id', $subjectId);
            })
            ->with('assessment') // Eager load the assessment
            ->get();

        return view('results.showBySubject', compact('results', 'subject'));
    }

    public function create()
    {
        return view('results.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'assessment_id' => 'required|integer|exists:assessments,id',
            'score' => 'required|numeric',
            'grade' => 'required|string|max:1'
        ]);

        // Create a new result instance and fill it with validated data
        $result = new Result();
        $result->user_id = $request->input('user_id');
        $result->assessment_id = $request->input('assessment_id');
        $result->score = $request->input('score');
        $result->grade = $request->input('grade');
        $result->save(); // Save the result to the database

        // Redirect to a page, e.g., the index page with a success message
        try {
            Result::create($request->all()); // Use create() with mass assignment
            return redirect()->route('manageResult')->with('success', 'Result created successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating result: ' . $e->getMessage()); // Log the error for debugging
            return redirect()->back()->with('error', 'Failed to create result. Please try again.');
        }
    }

    public function show(Result $result)
    {
        return view('results.show', compact('result'));
    }

    

    public function edit(Result $result)
    {
        return view('results.edit', compact('result'));
    }

    public function update(Request $request, Result $result)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'assessment_id' => 'required|exists:assessments,id',
            'score' => 'required|numeric',
            'grade' => 'required|in:A,B,C,D,F',
        ]);

        $result->update($request->all());

        return redirect()->route('results.index')->with('success', 'Result updated successfully.');
    }

    public function destroy(Result $result)
    {
        $result->delete();

        return redirect()->route('results.index')->with('success', 'Result deleted successfully.');
    }
    
}
