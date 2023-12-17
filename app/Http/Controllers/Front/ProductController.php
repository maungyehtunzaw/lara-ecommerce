<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct(Request $req)
    {
        $category= $req->query('category','');
        $search = $req->query('search','');
       // dd($category);
        $query = Product::query();
        if($category!=''){
            $query->where('categories_id',$category);
        }
        // if($search!=''){
        //     $query->where('');
        // }
        $products = $query->paginate(12);

        return view('frontend.product.index',compact('products'));
    }
    public function showDetail(int $id)
    {
         $product=Product::findOrFail($id);
        // dd($product->id);
        $product->load('category','images');
        // dd($product->category->name);
        $relatedProducts=Product::where('categories_id',$product->categories_id)->take(4)->get();
        return view('frontend.product.view',compact('product','relatedProducts'));
    }

}
