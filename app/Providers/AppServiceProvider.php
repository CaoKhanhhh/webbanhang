<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Product;
use Cart;

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
        View::composer(['layouts.clients.sidebar','layouts.clients.header'],function($view){
            $cates =Category::all();
            $view->with('cates',$cates);
        });
        View::composer('checkout',function($view){
            $tongcong =Cart::subtotal(0);
            $view->with('tongcong',$tongcong);
        });
        View::composer('layouts.clients.header',function($view){
            $cartcount =Cart::count();
            $view->with('cartcount',$cartcount);
        });
        View::composer('detail-product',function($view){
           $recommend = Product::take(6)->orderBy('star','desc')->get();
            $view->with('recommend',$recommend);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
