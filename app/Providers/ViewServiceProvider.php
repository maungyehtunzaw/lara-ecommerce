<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // dd("hereami");
        view()->composer('frontend.elements.header', function ($view) {
            $categories= Category::all();
            $total_qty=0;
            if(auth()->guard('cus')->check()){
                $customerId= auth()->guard('cus')->user()->id;
                $total_qty= OrderItem::where(['customers_id'=>$customerId,'status'=>0])->whereNull('orders_id')->sum('qty');
            }
            else if(session()->has('cart')){
                $cart = session()->get('cart');
                $total_qty = array_sum(array_column($cart, 'qty'));

            }
            $view->with('categories', $categories);
            $view->with('total_qty',$total_qty);
        });

        // Facades\View::composer('dashboard', function (View $view) {
        //     // ...
        // });

    }
}
