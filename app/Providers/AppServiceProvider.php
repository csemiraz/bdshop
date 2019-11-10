<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Brand;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength('191');
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        view()->share([
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }
}
