<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
       
        $this->registerPolicies();

        Gate::define('view-admin-menu', function ($user) {
            return auth()->check() && auth()->user()->role == 'Admin';
        });
    
        Gate::define('view-member-menu', function ($user) {
            return auth()->check() && auth()->user()->role == 'Member';
        });
    
        Gate::define('view-direktur-menu', function ($user) {
            return auth()->check() && auth()->user()->role == 'Direktur';
        });

        Gate::define('view-all-menu', function ($user) {
            return auth()->check() && ($user->role == 'Admin' || $user->role == 'Direktur' || $user->role == 'Direktur');
        });
        Gate::define('view-menu', function ($user) {
            if (auth()->check()) {
                $role = auth()->user()->role;
                return $role == 'Admin' || $role == 'Member' || $role == 'Direktur';
            }
            return false;
        });
    }
}
