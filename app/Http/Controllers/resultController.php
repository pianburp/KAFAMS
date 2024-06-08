<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::all();
        return view('results.index', compact('results'));
    }

    public function create()
    {
        return view('results.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'assessment_id' => 'required|exists:assessments,id',
            'score' => 'required|numeric',
            'grade' => 'required|in:A,B,C,D,F',
        ]);

        Result::create($request->all());

        return redirect()->route('results.index')->with('success', 'Result created successfully.');
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
