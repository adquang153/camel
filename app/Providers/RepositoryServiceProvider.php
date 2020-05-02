<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Banner\BannerRepositoryInterface;
use App\Repositories\Banner\BannerRepository;

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
            BannerRepositoryInterface::class, BannerRepository::class
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
