<?php

namespace App\Repositories\Admin;

use App\Models\Product;
use App\Interfaces\Admin\ProductInterface;
use App\Models\ProductImage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
        $this->uploadImage($req->file('image'),$product->id);
        // $this->uploadGallery($req->file('gallery'),$product->id);
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
        if(isset($data['image'])){
            $this->uploadImage($data['image'],$product->id);
        }
        return true;

      }
      catch(\Exception $e){
        DB::rollBack();
        return false;
      }
    }

    private function uploadImage($image=null,$productId)
    {
        $imageName = time().'.'.$image->extension();
        $upload = $image->move(public_path('upload/products/'), $imageName);
        $this->resizeProductImage($upload,$imageName);
        $product = Product::find($productId);
        $product->image = $imageName;
        $product->save();
        return $imageName;
    }
    private function uploadGallery($image = null,$productId){
        if($image!=null){
            foreach($image as $key=>$img){
                $imageName =time()."_".$key.'.'.$img->extension();
                $upload = $img->move(public_path('upload/products/'), $imageName);
                $this->resizeProductImage($upload,$imageName);
                $gallery = new ProductImage();
                $gallery->products_id = $productId;
                $gallery->image = $imageName;
                $gallery->save();
            }
        }
    }
    private function resizeProductImage($upload,$imageName){
        $manager = new ImageManager(new Driver());
        $image = $manager->read($upload);
        $image->resize(640, 480)->toJpeg()->save(public_path('upload/products/large/'.$imageName));
        $image->resize(300, 225)->toJpeg()->save(public_path('upload/products/small/'.$imageName));
        $image->resize(140, 105)->toJpeg()->save(public_path('upload/products/thumb/'.$imageName));
    }
    public function softDeleteProduct($id){
        $product = Product::find($id);
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
