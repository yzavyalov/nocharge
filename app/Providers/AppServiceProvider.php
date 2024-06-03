<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\NewUserRoleObserver;
use Illuminate\Pagination\Paginator;
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

        User::observe(NewUserRoleObserver::class);

        Paginator::defaultView('vendor.pagination.bootstrap-5');

        Paginator::defaultSimpleView('vendor.pagination.bootstrap-5');
    }
}
