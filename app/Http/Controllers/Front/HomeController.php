<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\SpecialOffer;

class HomeController extends Controller
{
    /**
     * Show the home page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $new_arrivals = Product::take(8)->latest()->get();
        $recommended = Product::where('is_recommend', true)->take(8)->get();
        $categories = Category::withCount('product')->take(12)->get(); // get category with most
        $feature_categories = Category::where('is_feature',1)->take(3)->get();
        $special_offers = SpecialOffer::take(2)->get();
        // return view('frontend.home',compact('new_arrivals','recommended'));
        return view('frontend.index',compact('new_arrivals','recommended','categories','feature_categories','special_offers'));
    }
}
