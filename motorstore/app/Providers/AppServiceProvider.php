<?php

namespace App\Providers;

use App\Repository\Branch\BranchRepository;
use App\Repository\Branch\BranchRepositoryInterface;
use App\Repository\CategoryRepository;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\Order\OrderRepository;
use App\Repository\Order\OrderRepositoryInterface;
use App\Repository\Post\PostRepositoryInterface;
use App\Repository\Post\PostRepository;
use App\Repository\Product\ProductRepository;
use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
          PostRepositoryInterface::class,
            PostRepository::class
        );

        $this->app->singleton(
           CategoryRepositoryInterface::class,
           CategoryRepository::class
        );

        $this->app->singleton(
            BranchRepositoryInterface::class,
            BranchRepository::class
        );

        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->singleton(
            OrderRepositoryInterface::class,
            OrderRepository::class
        );


    }
}
