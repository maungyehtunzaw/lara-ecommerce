<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
class HomeController extends Controller
{
    /**
     * Show the home page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $new_arrivals = Product::orderBy('created_at', 'desc')->take(4)->get();
        $recommended = Product::where('is_recommend', true)->take(8)->get();
        $categories = Category::take(8)->get(); // get category with most products
        return view('frontend.home',compact('new_arrivals','recommended'));
    }
}
