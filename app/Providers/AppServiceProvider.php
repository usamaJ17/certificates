<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
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
        Gate::define('supervisor', function ($user) {
            return $user->hasRole('supervisor');
        });
    
        Gate::define('admin', function ($user) {
            return $user->hasRole('admin');
        });
    
        Gate::define('super-admin', function ($user) {
            return $user->hasRole('super_admin');
        });
        Gate::define('team-member', function ($user) {
            if ($user->hasRole('super_admin') || $user->hasRole('admin') || $user->hasRole('supervisor')) {
                if(Route::is('certificates.view') || Route::is('certificates.form')) {
                    return false;                    
                }
                return true;
            } else {
                return false;
            }
        });
    }
}
