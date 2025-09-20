<?php

namespace App\Providers;

use App\Models\Role;
use App\Policies\RolePolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('permissions', function () {
            return include base_path('data/permissions.php');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        Gate::before(function ($user, $ability) {
            $role = $user->role;
            if ($role && $role->permissions == -1)
                return true;
        });
    }
}
