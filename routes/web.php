<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => 'admin',
    'middleware' => ['auth'],
], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::post('/orderconfirm','OrderController@confirm')->name('order.confirm');

    Route::resource('product', 'ProductController'); //proudct.crate edit delte show 
    Route::resource('category', 'CategoryController');
    Route::resource('order', 'OrderController');
    Route::resource('user', 'UserController');
    Route::resource('customer', 'CustomerController');
});

// That go for the front end.
Route::group([
    'namespace' => 'App\Http\Controllers\Front',
], function () {
    Route::get('/', 'HomeController@index')->name('front.home');
    Route::get('/customer/login', 'CustomerAuthController@showLogin')->name('front.login');
    Route::post('/postlogin', 'CustomerAuthController@postLogin')->name('front.postlogin');
    Route::get('/customer/register', 'CustomerAuthController@showRegister')->name('front.register');
    Route::post('/postregister', 'CustomerAuthController@postRegister')->name('front.postregister');

    Route::get('/product', 'ProductController@showProduct')->name('front.product');
    Route::get('/product/{id}', 'ProductController@showDetail')->name('front.product.show');

    Route::post('/addtocart', 'CartController@saveToCart')->name('front.cart.addtocart');
    Route::post('/removefromcart', 'CartController@removeFromCart')->name('front.cart.removefromcart');
    Route::get('/order/cart', 'CartController@index')->name('front.cart');
    Route::get('/order/payment','CartController@payment')->name('front.payment');
    Route::post('/savepayment','CartController@savePayment')->name('front.pay');
    Route::get('/order/success','OrderController@checkoutSuccess')->name('checkout.success');


    Route::group(['middleware' => ['auth:cus']], function () {
        Route::post('/customer/logout', 'CustomerAuthController@logout')->name('customer.logout');

        Route::get('/account/profile', 'CustomerAuthController@showProfile')->name('front.profile');
        Route::get('/account/address', 'CustomerAuthController@showAddress')->name('front.address');

        Route::get('/orders', 'OrderController@showOrders')->name('front.orders');
        Route::get('/orders/{id}', 'OrderController@show')->name('front.orders.show');

    });

});

require __DIR__.'/auth.php';
