<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programs;

class activityController extends Controller
{
    public function index()
    {
        $item = Programs::all();
        return view('manageActivity.activitiesPage', compact('item'));
    }

    public function edit($id)
{
    // Fetch the program by its ID
    $item = Programs::findOrFail($id); // Use findOrFail to automatically handle the case where the program doesn't exist

    // Pass the program data to the view
    return view('manageActivity.editActivities', compact('item'));
}


    public function create()
    {
        return view('manageActivity.activitiesForm');
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'program_name' => 'required|string|max:255',
            'program_description' => 'required|string',
            'program_date' => 'required|date',
        ]);

        // Create and save the new program using the correct model name
        $program = new Programs();  
        $program->program_name = $validatedData['program_name'];
        $program->program_description = $validatedData['program_description'];
        $program->program_date = $validatedData['program_date'];
        $program->save();

        return redirect()->route('manageActivity')->with('success', 'Activity has been saved successfully!');
    }


    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'program_name' => 'required|string|max:255',
            'program_description' => 'required|string',
            'program_date' => 'required|date',
        ]);

        // Find and update the program
        $program = Programs::findOrFail($id);
        $program->program_name = $validatedData['program_name'];
        $program->program_description = $validatedData['program_description'];
        $program->program_date = $validatedData['program_date'];
        $program->save();

        // Redirect to a specific route after saving, with a success message
        return redirect()->route('manageActivity')->with('success', 'Activity has been updated successfully!');
    }
    public function delete($id)
    {
        // Find the program by ID
        $program = Programs::find($id);

        // Check if the program was found
        if (!$program) {
            return redirect()->route('manageActivity')->with('error', 'Activity not found.');
        }

        // Delete the program
        $program->delete();

        // Redirect back to a specific route with a success message
        return redirect()->route('manageActivity')->with('success', 'Activity has been deleted successfully!');
    }

}
