<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    public function showLogin(){
        // dd("wtf");
        return view('frontend.login');
    }
    public function showRegister(){
        // dd("wtf");
        return view('frontend.register');
    }
}
