<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    // display the login form
    public function showLoginForm()
    {
        return view('login');
    }
    //this is for handling login requests
    public function login(Request $request)
    {
        //validating the login credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:40',

        ]);

        //authentication attempt:
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->route('profile')->with('success', 'You have successfully logged in.');
        }
        // this is to go back if the authentication process fails
        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
    }

    //this is the user logout feature:
    public function logout(Request $request)
    {
        Auth::logout(); // loging the user our
        $request->session()->invalidate(); // terminating the sessions
        $request->session()->regenerateToken(); // generating csrf token again
        return redirect('/')->with('success', 'You have successfully logged out.');
    }
    //displaying the create account form
    public function showRegisterForm()
    {
        return view('createaccount');
    }
    //displaying the password reset form
    public function resetPasswordForm()
    {
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
            'password' => Hash::make($validated['password']),
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
        return redirect()->route('profile')->with('success', 'Welcome to Astonic Sports!');
    }
    //showing the profile dashboard
    public function showProfile()
    {
        return view('profile');
    }
    public function personalDetails()
    {
        return view('personaldetails');
    }
    public function orderHistory()
    {
        return view('orderhistory');
    }
    public function changePassword()
    {
        return view('changepassword');
    }
    public function paymentMethod()
    {
        return view('paymentmethod');
    }
    public function contactPreferences()
    {
        return view('contactpreferences');
    }
    public function contactUs()
    {
        return view('contactus');
    }
    public function wishlist()
    {
        return view('wishlist');
    }
}
