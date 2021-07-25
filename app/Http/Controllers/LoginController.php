<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function getSignin(){
        return view('login.signin');
    }

    public function getSignup(){
        return view('login.signup');
    }

}
