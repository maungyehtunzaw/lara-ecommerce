<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;

use App\Interfaces\Admin\ProductInterface;
use App\Interfaces\Api\CustomerAuthInterface;
use App\Repositories\Admin\ProductRepository;
use App\Repositories\Api\CustomerAuthRepository;

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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
