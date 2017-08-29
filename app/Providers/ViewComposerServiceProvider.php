<?php

namespace App\Providers;

use App\CustomClasses\LangMap;
use App\Evento;
use App\Imagen;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{

    private static $categories;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //front
        $this->nav();

        $this->bestsellers();

        //admin
        view()->composer('admin/*/form*', 'App\Http\ViewComposers\FormComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function nav ()
    {
        view()->composer('front/partials/top-bar', function ($view)
        {
            $categories = self::getCategories();
            $view->with('categories', $categories);
        });

        view()->composer('front/asides/categories', function ($view)
        {
            $categories = self::getCategories();
            $view->with('categories', $categories);
        });
    }

    private function bestsellers()
    {
        view()->composer('front/asides/bestsellers', function ($view)
        {
            $bestsellers = \App\Product::bestsellers(2);
            $view->with('bestsellers', $bestsellers);
        });
    }

    private static function getCategories()
    {
        if(!self::$categories) self::$categories = \App\Category::with('subcategories')->get();
        return self::$categories;
    }

}
