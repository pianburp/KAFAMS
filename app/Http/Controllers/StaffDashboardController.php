<?php

namespace App\Http\Controllers;

use App\Models\Bulletins;
use Illuminate\Http\Request;
use App\Models\Enrollment; 
use App\Models\Result;     
use App\Models\Bulletin;   
use App\Models\Classes;
use App\Models\Attendance;

class StaffDashboardController extends Controller
{
    public function index()
    {
        $staffId = auth()->user()->id; 

        // Fetch relevant data for the staff's dashboard
        $pendingEnrollments = Enrollment::where('enrollment_status', 'pending')->get();
        $upcomingClasses = Classes::where('instructor_id', $staffId)
                                  ->where('start_date', '>=', now())
                                  ->get();
        $recentAttendance = Attendance::whereIn('class_id', function ($query) use ($staffId) {
                                          $query->select('class_id')
                                                ->from('classes')
                                                ->where('instructor_id', $staffId);
                                      })
                                      ->latest()
                                      ->take(10) // Get the 10 most recent attendance records
                                      ->get();
        $bulletins = Bulletins::all(); // Or filter based on staff's permissions

        return view('staff.dashboard', [
            'pendingEnrollments' => $pendingEnrollments,
            'upcomingClasses' => $upcomingClasses,
            'recentAttendance' => $recentAttendance,
            'bulletins' => $bulletins,
        ]);
    }
}
