<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ProductsDataTable;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\ProductInterface;
use App\Models\Category;

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
    public function store(StoreProductRequest $request)
    {
       if($this->productRepo->createProduct($request->validated())){
         return redirect()->route('product.index')->with('success','Product created successfully');
       }
       return redirect()->back()->with('error','Something went wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
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
    public function destroy(Product $product)
    {
        if($this->productRepo->softDeleteProduct($product)){
          return redirect()->route('product.index')->with('success','Product deleted successfully');
        }
        return redirect()->back()->with('error','Something went wrong');
    }

    public function forcedelete(Product $product){
        if($this->productRepo->forceDeleteProduct($product)){
            return redirect()->route('product.index')->with('success','Product deleted successfully');
        }
        return redirect()->back()->with('error','Something went wrong');
    }


}
