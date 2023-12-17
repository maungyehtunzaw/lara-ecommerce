<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;

use App\Interfaces\Admin\ProductInterface;
use App\Interfaces\Api\CustomerAuthInterface;
use App\Interfaces\Front\CartInterface;
use App\Repositories\Admin\ProductRepository;
use App\Repositories\Api\CustomerAuthRepository;
use App\Repositories\Front\CartRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //admin
        $this->app->bind(ProductInterface::class, ProductRepository::class );

        //api
        $this->app->bind(CustomerAuthInterface::class,CustomerAuthRepository::class);

        //frontend
        $this->app->bind(CartInterface::class,CartRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
