<?php

namespace App\Repositories\Admin;

use App\Models\Product;
use App\Interfaces\Admin\ProductInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
class ProductRepository implements ProductInterface
{


    public function createProduct($req) : bool
    {
        DB::beginTransaction();
      try{
        $product = new Product();
        $product->name = $req->name;
        $product->unit_rate = $req->unit_rate;
        $product->description = $req->description;
        // $product->qty = $data['qty'];
        $product->categories_id = $req->categories_id;
        $product->save();
        DB::commit();
        return true;

      }
      catch(\Exception $e){
        DB::rollBack();
        return false;
      }
    }
    public function updateProduct(int $productId, array $data): bool
    {
        DB::beginTransaction();
      try{
        $product = Product::find($productId);
        $product->name = $data['name'];
        $product->unit_rate = $data['unit_rate'];
        $product->description = $data['description'];
        // $product->qty = $data['qty'];
        $product->categories_id = $data['categories_id'];
        $product->save();
        DB::commit();
        return true;

      }
      catch(\Exception $e){
        DB::rollBack();
        return false;
      }
    }

    private function uploadImage($image)
    {
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('upload/products/'), $imageName);
        Image::make($image)->resize(400, 300)->save();
        return $imageName;
    }
    public function softDeleteProduct($product): Response{

        if( $product->delete()){

            return response()->json([
                'success'=>true,
                'status'=>'success',
                'message'=>'Product Deleted Successful #'.$product->name,
            ]);
        }
        return response()->json([
            'success'=>false,
            'status'=>'error',
            'message'=>'cannot deleted right now, try agian later',

        ]);
    }

    public function forceDeleteProduct($product): Response{
        return $product->forceDelete();
    }


}
