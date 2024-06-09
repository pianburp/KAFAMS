<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // ... your existing code ...

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            if ($user->user_type === 'admin') {
                return redirect()->route('admin.dashboard'); 
            } elseif ($user->user_type === 'staff') {
                return redirect()->route('staff.dashboard');
            } else {
                return redirect()->route('student.dashboard'); 
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
