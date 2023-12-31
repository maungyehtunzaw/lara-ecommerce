<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ProductsDataTable;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\ProductInterface;
use App\Models\Category;
use App\Models\OrderItem;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $productRepo;
    public function __construct(ProductInterface $pi)
    {
        $this->productRepo = $pi;
    }
    public function index(ProductsDataTable $datatable)
    {
        return $datatable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = $this->productRepo->getCategories();
        $categories=Category::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $req)
    {
        // dd($req->all());
       if($this->productRepo->createProduct($req)){
         return redirect()->route('product.index')->with('success','Product created successfully');
       }
       return redirect()->back()->with('error','Something went wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('category','images');
        $data['total_order'] = OrderItem::where('products_id',$product->id)->count();
        $data['total_qty'] = OrderItem::where('products_id',$product->id)->sum('qty');
        $data['total_amount'] = OrderItem::where('products_id',$product->id)->sum('total_amount');
        $recent_orders = OrderItem::with('order','order.customer')->where('products_id',$product->id)->latest()->take(5)->get();
        return view('admin.product.show', compact('product','data','recent_orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // dd($product->name);
        $categories=Category::all();
        return view('admin.product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if($this->productRepo->updateProduct($product->id,$request->validated())){
          return redirect()->route('product.index')->with('success','Product updated successfully');
        }
        return redirect()->back()->with('error','Something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // return response()->json([
        //     'success'=>true,
        //     'status'=>'success',
        //     'message'=>'Product Deleted Successful #'.$id
        // ]);
       return $this->productRepo->softDeleteProduct($id);
    }

    public function forcedelete(Product $product){
        if($this->productRepo->forceDeleteProduct($product)){
            return redirect()->route('product.index')->with('success','Product deleted successfully');
        }
        return redirect()->back()->with('error','Something went wrong');
    }


}
