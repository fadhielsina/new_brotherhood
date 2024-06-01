<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin', function () {
            return Auth::user()->roles->pluck('name')[0] === 'admin';
        });

        Gate::define('member-merchant', function () {
            return Auth::user()->roles->pluck('name')[0] === 'member-merchant';
        });

        Gate::define('member', function () {
            return Auth::user()->roles->pluck('name')[0] === 'member';
        });

        Gate::define('merchant', function () {
            return Auth::user()->roles->pluck('name')[0] === 'merchant';
        });
    }
}
