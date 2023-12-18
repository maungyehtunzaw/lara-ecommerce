<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;

class DashboardController extends Controller
{
   public function index()
    {
        $data['total_orders'] = Order::count();
        $data['total_products'] = Product::count();
        $data['total_customers'] = Customer::count();
        $data['total_sales'] = Order::sum('total_amount');
        // dd($data);
        return view('dashboard',compact('data'));
    }
}
