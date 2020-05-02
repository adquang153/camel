<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Banner\BannerRepositoryInterface;
use App\Repositories\Banner\BannerRepository;
use App\Repositories\ProductType\ProductTypeRepositoryInterface;
use App\Repositories\ProductType\ProductTypeRepository;
use App\Repositories\Products\ProductsRepositoryInterface;
use App\Repositories\Products\ProductsRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            BannerRepositoryInterface::class, BannerRepository::class,
        );
        $this->app->bind(
            ProductTypeRepositoryInterface::class, ProductTypeRepository::class
        );
        $this->app->bind(
            ProductsRepositoryInterface::class, ProductsRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
