<?php

namespace App\Providers;

<<<<<<< HEAD
=======
use App\Models\User;
use App\Observers\NewUserRoleObserver;
>>>>>>> 2c834df24b0f0b6f1633d56f1315cd3c697d6124
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
<<<<<<< HEAD
        //
=======
        User::observe(NewUserRoleObserver::class);
>>>>>>> 2c834df24b0f0b6f1633d56f1315cd3c697d6124
    }
}
