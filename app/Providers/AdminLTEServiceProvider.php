<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdminLTEServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            base_path('vendor\almasaeed2010\adminlte\dist') => public_path('assets/dist/')
        ], 'public');

        $this->publishes([
            base_path('vendor\almasaeed2010\adminlte\bootstrap') => public_path('assets/bootstrap/')
        ], 'public');

        $this->publishes([
            //__DIR__.'/vendor/almasaeed2010/dist' => public_path('assets')
            base_path('vendor\almasaeed2010\adminlte\plugins') => public_path('assets/plugins/')
        ], 'public');
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
