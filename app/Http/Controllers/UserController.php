<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
