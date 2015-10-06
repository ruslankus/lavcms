<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposer extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeLng();
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


    public function composeLng(){
        //view()->composer('navs._lang_switcher','App\Http\Composers\LngComposer@lngCompose' );
        view()->composer('blocks._home','App\Http\Composers\LngComposer@lngCompose' );

    }
}
