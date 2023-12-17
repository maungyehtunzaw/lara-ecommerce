<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\storeCheckOutRequest;
use App\Interfaces\Front\CartInterface;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

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
        if(auth()->guard('cus')->check()){
            $customerId = auth()->guard('cus')->user()->id;
            $orderItems = OrderItem::with('product:id,name,unit_rate')->where(['customers_id'=>$customerId,'status'=>0])->whereNull('orders_id')->get()->toArray();
            // dd("auth data");
            // dd($orderItems->toArray());
        }else{
            //get order item from session

            $orderItems = Session::get('cart');
            // dd($orderItems);
        }



        return view('frontend.order.cart',compact('orderItems'));
    }
    public function payment()
    {
        if(auth()->guard('cus')->check()){
            $customerId = auth()->guard('cus')->user()->id;
            $customer = Customer::with('addresses')->find($customerId);
            $orderItems = OrderItem::with('product:id,name,unit_rate')->where(['customers_id'=>$customerId,'status'=>0])->whereNull('orders_id')->get()->toArray();
        }
        else{
            //get order item from session
            $orderItems = Session::get('cart');
            $customer =[];
            // dd("here?");
        }

        if(empty($orderItems)){
            // dd($orderItems);
            return redirect()->route('front.product')->with('error','Your cart is empty, try to cart more product');
        }

        return view('frontend.order.payment',compact('orderItems','customer'));
    }
    public function  saveToCart(Request $req)
    {
       $data= $this->cartRepository->addToCart($req);
    }

    public function removeFromCart(Request $req)
    {
        $productId = $req->input('product_id');
        if (auth()->guard('cus')->check()) { //save to database if session
            $customerId = auth()->guard('cus')->user()->id;
            $orderItem = OrderItem::where(['customers_id' => $customerId, 'products_id' => $productId,'status'=>0])->whereNull('orders_id')->first();
            $orderItem->delete();
        } else {
            $cart = Session::get('cart');

            if(isset($cart[$productId])) {
                unset($cart[$productId]);
                session()->put('cart', $cart);
            }

        }
        return response()->json([
            'success' => true,
            'message' => 'Remove Item Success # '.$productId,
            'product_id' => $productId,
            'data' => $req->all()
        ]);
    }
    public function savePayment(storeCheckOutRequest $req){
       $data= $this->cartRepository->storeCheckOut($req);
       if($data['success']) {
        return redirect()->route('checkout.success')->with('success','Order Placed Successfully');
       }
       return redirect()->back()->with('error','Something went wrong');

    }
}
