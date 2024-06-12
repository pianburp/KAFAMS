@extends('layouts.app')

@section('content')
<head>
    <style>
        footer {
  position: relative;
  bottom: 0;
  width: 100%; /* Ensures footer spans the full width */
}
    </style>
</head>
<section class=" m-5 p-5 bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md"> <div class="bg-white p-8 rounded-lg shadow-md">

        <h1 class="pt-5 text-3xl font-bold text-center mb-6 text-gray-800">
            Welcome Back!
        </h1>

        <div class="container p-5 items-center justify-center">
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">
                    Email Address
                </label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    required 
                    autofocus
                    class="m-3 p-2 w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-500"
                >
                @error('email')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">
                    Password
                </label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password"
                    class="m-5 p-2 w-full border rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-indigo-500"
                >
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        name="remember" 
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                    >
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                        Remember me
                    </label>
                </div>
                
                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 hover:text-indigo-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium btn-primary text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Sign in
                </button>
            </div>
        </form>
        </div>
        <p class="mt-4 mb-4 text-center text-sm text-gray-600 ">
            Don't have an account? 
            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                Sign up
            </a>
        </p>

    </div></div>
</section>
@endsection