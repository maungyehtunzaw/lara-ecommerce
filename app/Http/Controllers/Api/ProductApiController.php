<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Api\ProductApiInterface;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    private $productApiRepository;
    public function __construct(ProductApiInterface $pi)
    {
        $this->productApiRepository = $pi;
    }
    public function getProduct(Request $req){
        $pageSize = $req->get('pagesize',10);
        $categoryId = $req->get('category','');

        return response()->json(['data'=>'test data'],200);
    }
}
