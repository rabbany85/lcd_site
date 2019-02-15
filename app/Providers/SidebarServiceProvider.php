<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class SidebarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('Client', function(){
            return auth()->user() && auth()->user()->user_type == 'Client';
        });

        Blade::if('Admin', function(){
            return auth()->user() && auth()->user()->user_type == 'Admin';
        });

        Blade::if('Manager', function(){
            return auth()->user() && auth()->user()->user_type == 'Manager';
        });

        Blade::if('SuperAdmin', function(){
            return auth()->user() && auth()->user()->user_type == 'Super Admin';
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
