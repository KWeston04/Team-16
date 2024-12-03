<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function showLoginForm(){
        return view('login');
    }
    public function showRegisterForm(){
        return view('createaccount');
    }
    public function resetPasswordForm(){
        return view('resetpassword');
    }
    
    /**
     * This is the function for registering a user
     */
    public function register(Request $request)
    {
        // this is validating the incoming data
        $validated = $request->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:15',
            'password' => 'required|confirmed|min:8|max:40',
            'address' => 'required|string|max:500',
        ]);
        // this is for creating a new user and storing it in database
        $user = User::create([
            'username' => $validated['email'],
            'password_hash' => Hash::make($validated['password']),
            'email' => $validated['email'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'phone_number' => $validated['phone_number'],
            'address' => $validated['address'],
        ]);
        //this is to log the user in and regenerate the session for security
        auth()->login($user);
        $request->session()->regenerate();
        // this redirects to the homepage with a success message
        return redirect('/')->with('success', 'Welcome to Astonic Sports!');
    }
}