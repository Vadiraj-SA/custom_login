<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Get the credentials from the request
        $credentials = $request->only('email', 'password');

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Redirect to the dashboard on successful login
            return redirect()->intended('/dashboard');
        }

        // Redirect back to the login form with an error message if authentication fails
        return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
    }

    // Handle the logout request
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}


// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class LoginController extends Controller
// {
//     // Add the redirection property
//     //protected $redirectTo = '/dashboard';
 
//     // Constructor to apply middleware
//     // public function __construct()
//     // {
//     //     $this->middleware('guest')->except('logout');
//     // }

//     // Show the login form
//     public function showLoginForm()
//     {
//         return view('auth.login');
//     }

//     // Handle the login request
//     public function login(Request $request)
//     {
//         // Validate the request data
//         $request->validate([
//             'email' => 'required|string|email',
//             'password' => 'required|string',
//         ]);

//         // Get the credentials from the request
//         $credentials = $request->only('email', 'password');

//         // Attempt to log the user in
//         if (Auth::attempt($credentials)) {
//             // Redirect to the dashboard on successful login
//             return redirect()->intended($this->redirectTo);
//         }

//         // Redirect back to the login form with an error message if authentication fails
//         return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
//     }

//     // Handle the logout request
//     public function logout(Request $request)
//     {
//         Auth::logout();

//         $request->session()->invalidate();

//         $request->session()->regenerateToken();

//         return redirect('/');
//     }
// }
