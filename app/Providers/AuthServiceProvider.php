<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
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
        // Creaccion de gates para administracion de nivel de usuario
        Gate::define('admin', function (User $user) {
            return $user->hasPermission('admin');
        });
        
        Gate::define('default', function (User $user) {
            return $user->hasPermission('manage-users');
        });
    }
}
