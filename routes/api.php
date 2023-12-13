<?php

use App\Http\Controllers\Api\CustomerAuthController;
use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/customer/login",[CustomerAuthController::class,'login']);
Route::post("/customer/register",[CustomerAuthController::class,'register']);
Route::get("/customer/testdata",[CustomerAuthController::class,'data']);
Route::get("/product/filter",[ProductApiController::class,'getProductFilter']);
Route::get("/product/detail/{id}",[ProductApiController::class,'getProductDetail']);
Route::group(['namespace' => 'App\Http\Controllers\Api','middleware' => ['auth:api']], function () {

    Route::post("/customer/logout",[CustomerAuthController::class,'logout']);
    Route::get("/customer/profile",[CustomerAuthController::class,'profile']);


    Route::get("/products",[ProductApiController::class,'getProductSearch']);

});
