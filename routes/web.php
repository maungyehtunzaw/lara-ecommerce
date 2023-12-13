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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

    Route::resource('product', 'ProductController');
    Route::resource('category', 'CategoryController');
    Route::resource('order', 'OrderController');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Front',
    // 'prefix' => 'user',
    // 'middleware' => ['auth'],
], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/login', 'CustomerAuthController@showLogin')->name('customer.login');
    Route::get('/register', 'CustomerAuthController@showRegister')->name('customer.register');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/logout', 'CustomerAuthController@logout')->name('customer.logout');
        Route::get('/profile', 'CustomerAuthController@profile')->name('customer.profile');
    });

});

require __DIR__.'/auth.php';
