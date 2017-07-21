<?php

namespace App\Providers;

use App\CustomClasses\LangMap;
use App\Evento;
use App\Imagen;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
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

}
