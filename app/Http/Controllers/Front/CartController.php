<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\storeCheckOutRequest;
use App\Interfaces\Front\CartInterface;
use App\Models\Address;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $cartRepository;
    public function __construct(CartInterface $ci)
    {
        $this->cartRepository = $ci;
    }
    public function index()
    {
        //  Session::forget('cart');
        // Session::flush();
        //  Session::save();
        $orderItems = $this->cartRepository->getCartItem();
        return view('frontend.order.cart',compact('orderItems'));
    }
    public function payment()
    {
       $orderItems = $this->cartRepository->getCartItem();

        if(empty($orderItems)){
            return redirect()->route('front.product')->with('error','Your cart is empty, try to cart more product');
        }
        if(Auth::guard('cus')->check()){
            $cusId= Auth::guard('cus')->user()->id;
            $customer = Customer::where('id',$cusId)->first();
            $addresses = Address::where('customers_id',$cusId)->get();
            return view('frontend.order.payment',compact('orderItems','customer','addresses'));
        }

        return view('frontend.order.payment',compact('orderItems'));
    }
    // public function authpayment()
    // {
    //     $orderItems = $this->cartRepository->getCartItem();
    //     $customer =
    //     return view('frontend.order.userpayment');
    // }

    public function  saveToCart(Request $req)
    {
       return $this->cartRepository->addToCart($req);
    }

    public function removeFromCart(Request $req)
    {
        return $this->cartRepository->removeFromCart($req);
    }

    public function savePayment(storeCheckOutRequest $req){
       $data= $this->cartRepository->storeCheckOut($req);
       if($data['success']) {
        return redirect()->route('checkout.success')->with('success','Order Placed Successfully');
       }
       return redirect()->back()->with('error','Something went wrong');

    }
}
