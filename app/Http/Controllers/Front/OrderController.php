<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrders(){
        $id = auth()->guard('cus')->user()->id;
        $orders = Order::where('customers_id',$id)->get();
        // $orders = $customer->load('orders');


        return view('frontend.order.myorders',compact('orders'));
    }
    public function show($id){
        $customer = auth()->guard('cus')->user();
        $order = Order::with('order_items')->where(['customers_id'=>$customer->id,'id'=>$id])->first();
        return view('frontend.order.orderdetail',compact('order'));
    }
    public function checkoutSuccess(){
        return view('frontend.order.ordersuccess');
    }
}
