<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CustomerLoginRequest;
use App\Http\Requests\Api\CustomerRegisterRequest;
use App\Interfaces\Api\CustomerAuthInterface;
use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerAuthController extends Controller
{
    private $customerRepository;
    public function __construct(CustomerAuthInterface $ci)
    {
        $this->customerRepository=$ci;
    }
    public function login(CustomerLoginRequest $req){
        $credentials=$req->only('email','password');
        return $this->customerRepository->login($credentials);
    }
    public function register(CustomerRegisterRequest $req){
        // return response()->json(['data'=>$req->all()],200);
        return $this->customerRepository->register($req);
    }
    public function data(){
        return response()->json(['data'=>'test data'],200);
    }
}
