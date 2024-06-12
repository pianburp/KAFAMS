<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required', 'string', 'in:student,staff,admin'], // Validate user type
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_type' => $data['user_type'],
        ]);
    }

    public function register(Request $request)
    {
        // Validate the request data
        $this->validator($request->all())->validate();

        // Check if the email already exists
        if (User::where('email', $request->input('email'))->exists()) {
            return redirect()->back()->withInput()->withErrors(['email' => 'The email address is already registered.']);
        }

        // Create the user
        event(new \Illuminate\Auth\Events\Registered($user = $this->create($request->all())));

        // Log the user in
        $this->guard()->login($user);

        // Redirect based on user type
        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    protected function registered(Request $request, $user)
    {
        // Redirect based on user type after registration
        switch ($user->user_type) {
            case 'student':
                return redirect()->route('student.dashboard');
            case 'staff':
                return redirect()->route('staff.dashboard');
            case 'admin':
                return redirect()->route('admin.dashboard');
            default:
                return redirect()->route('home');
        }
    }
}
