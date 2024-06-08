<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programs;

class activityController extends Controller
{
    public function index(){
        $item = Programs::all();  
        return view('manageActivity.activitiesPage', compact('item'));  
    }

    public function edit(){
        return view('manageActivity.activityEdit');
    }

    public function create(){
        return view('manageActivity.activitiesForm');
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'program_name' => 'required|string|max:255',
            'program_description' => 'required|string',
            'program_status' => 'required|boolean',
            'program_date' => 'required|date',
        ]);

        // Create and save the new program
        $program = new Programs();
        $program->program_name = $validatedData['program_name'];
        $program->program_description = $validatedData['program_description'];
        $program->program_status = $validatedData['program_status'];
        $program->program_date = $validatedData['program_date'];
        $program->save();

        // Redirect to a specific route after saving, with a success message
        return redirect()->route('manageActivity.activitiesPage')->with('success', 'Program has been saved successfully!');
    }

    public function update(Request $request, $id){
        // Validate the incoming data
        $validatedData = $request->validate([
            'program_name' => 'required|string|max:255',
            'program_description' => 'required|string',
            'program_status' => 'required|boolean',
            'program_date' => 'required|date',
        ]);

        // Find and update the program
        $program = Programs::findOrFail($id);
        $program->program_name = $validatedData['program_name'];
        $program->program_description = $validatedData['program_description'];
        $program->program_status = $validatedData['program_status'];
        $program->program_date = $validatedData['program_date'];
        $program->save();

        // Redirect to a specific route after saving, with a success message
        return redirect()->route('manageActivity.activitiesPage')->with('success', 'Activity has been updated successfully!');
    }
}
