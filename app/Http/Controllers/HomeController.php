<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function redirectToDashboard()
    {
        // Redirects to the 'home' route
        return redirect()->route('welcome');
    }
    public function login()
    {
        // Your login logic or return a login view
        return view('auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
