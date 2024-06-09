<?php

namespace App\Http\Controllers;

use App\Models\Bulletins;
use Illuminate\Http\Request;
use App\Models\User;         
use App\Models\Enrollment;   
use App\Models\Result;       
use App\Models\Bulletin;     
use App\Models\Classes;      
use App\Models\Attendance;  

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Fetch relevant data for the admin's dashboard
        $totalStudents = User::where('user_type', 'student')->count();
        $totalStaff = User::where('user_type', 'staff')->count();
        $totalEnrollments = Enrollment::count();
        $recentEnrollments = Enrollment::latest()->take(10)->get();
        $upcomingClasses = Classes::where('start_date', '>=', now())->get();
        $recentBulletins = Bulletins::latest()->take(5)->get();

        return view('admin.dashboard', [
            'totalStudents' => $totalStudents,
            'totalStaff' => $totalStaff,
            'totalEnrollments' => $totalEnrollments,
            'recentEnrollments' => $recentEnrollments,
            'upcomingClasses' => $upcomingClasses,
            'recentBulletins' => $recentBulletins,
        ]);
    }
}
