<?php

namespace Story\Shop;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class StoryShopServiceProvider extends ServiceProvider
{
    protected $namespace = 'Story\\Shop';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'shop');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Route::group(
            ['prefix' => 'backend', 'middleware' => ['web'], 'namespace' => $this->namespace . '\\Backend\\Controllers'], function() {
            require __DIR__.'/../routes/backend.php';
        });
    }
}