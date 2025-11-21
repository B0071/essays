<?php

namespace App\Providers;

use App\Models\Essay;
use App\Models\User;
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
        //
        Gate::define('edit-essay', function(User $user, Essay $essay){
            return $user->id === $essay->user->id;
        });
    }
}
