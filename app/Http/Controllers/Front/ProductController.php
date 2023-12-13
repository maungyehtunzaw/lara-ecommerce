<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct()
    {
        return view('frontend.product.index');
    }
    public function showDetail($id)
    {
        $product=Product::findOrFail($id);
        return view('frontend.product.view',compact('product'));
    }
    
}
