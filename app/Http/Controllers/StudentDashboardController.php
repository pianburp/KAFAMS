<?php

namespace App\Http\Controllers;

use App\Models\Bulletins;
use Illuminate\Http\Request;
use App\Models\Enrollment; // Assuming you have an Enrollment model
use App\Models\Result;     // Assuming you have a Result model
use App\Models\Bulletin;   // Assuming you have a Bulletin model

class StudentDashboardController extends Controller
{
    public function index()
    {
        $studentId = auth()->user()->id; // Get the authenticated student's ID

        // Fetch relevant data for the student's dashboard
        $enrollments = Enrollment::where('user_id', $studentId)->get();
        $results = Result::where('user_id', $studentId)->get();
        $bulletins = Bulletins::all(); // Or filter based on student's category

        return view('student.dashboard', [
            'enrollments' => $enrollments,
            'results' => $results,
            'bulletins' => $bulletins,
        ]);
    }
}
