<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Banner\BannerRepositoryInterface;
use App\Repositories\Banner\BannerRepository;
use App\Repositories\ProductType\ProductTypeRepositoryInterface;
use App\Repositories\ProductType\ProductTypeRepository;
use App\Repositories\Products\ProductsRepositoryInterface;
use App\Repositories\Products\ProductsRepository;
use App\Repositories\PostType\PostTypeRepositoryInterface;
use App\Repositories\PostType\PostTypeRepository;
use App\Repositories\Posts\PostsRepositoryInterface;
use App\Repositories\Posts\PostsRepository;
use App\Repositories\Images\ImagesRepositoryInterface;
use App\Repositories\Images\ImagesRepository;

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
        $this->app->bind(
            PostTypeRepositoryInterface::class, PostTypeRepository::class
        );
        $this->app->bind(
            PostsRepositoryInterface::class, PostsRepository::class
        );
        $this->app->bind(
            ImagesRepositoryInterface::class, ImagesRepository::class
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
