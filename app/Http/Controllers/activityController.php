<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programs;


class activityController extends Controller
{
    public function index(){
        return view('manageActivity.activitiesPage');
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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'date' => 'required|date',
        ]);

        // Create and save the new program
        $program = new Programs();
        $program->name = $validatedData['name'];
        $program->description = $validatedData['description'];
        $program->status = $validatedData['status'];
        $program->date = $validatedData['date'];
        $program->save();

        // Redirect to a specific route after saving, with a success message
        return redirect()->route('manageActivity.activitiesPage')->with('success', 'Program has been saved successfully!');
    }
    public function update(Request $request, $id){
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'date' => 'required|date',
        ]);
        // Create and save the new program
        $program = Programs::find($id);
        $program->name = $validatedData['name'];
        $program->description = $validatedData['description'];
        $program->status = $validatedData['status'];
        $program->date = $validatedData['date'];
        $program->save();
        // Redirect to a specific route after saving, with a success message
        return redirect()->route('manageActivity.activitiesPage')->with('success', 'Activity has been updated successfully!');
    }
    
}
