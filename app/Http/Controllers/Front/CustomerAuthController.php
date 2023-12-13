<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    public function showLogin(){
        return view('front.login');
    }
    public function showRegister(){
        return view('front.register');
    }
}
