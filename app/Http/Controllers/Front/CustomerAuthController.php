<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerLoginRequest;
use App\Http\Requests\CustomerRegisterRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    public function showLogin(){
        return view('frontend.signin');
    }
    public function showRegister(){
        return view('frontend.signup');
    }

    public function showProfile(){
        $customer = auth()->guard('cus')->user();

        return view('frontend.customer.profile',compact('customer'));
    }

    public function postLogin(CustomerLoginRequest $request){
        // dd($request->validated());
        if(auth()->guard('cus')->attempt($request->validated())){
            return redirect()->route('front.profile')->with('success','Login successfully');
        }
        return redirect()->back()->with('error','Login failed');

    }
    public function postRegister(CustomerRegisterRequest $request){
        // $request->merge(['password'=>Hash::make($request->password)]);
        // if(Customer::create($request->validated())){
        //     return redirect()->route('front.login')->with('success','Register successfully');
        // }
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->first_name = $request->name; // update database refactor
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = Hash::make($request->password);
        //send verify email
        // $customer->sendEmailVerificationNotification();
        if($customer->save()){
            return redirect()->route('front.login')->with('success','Register successfully');
        }
        return redirect()->back()->with('error','Register failed');

    }
    public function logout(){
        auth()->guard('cus')->logout();
        return redirect()->route('front.home');
    }


}
