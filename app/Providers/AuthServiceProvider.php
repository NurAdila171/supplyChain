<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('role_admin', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('role_supplier', function (User $user) {
            return $user->role === 'supplier' || $user->role === 'admin';
        });

        Gate::define('role_kasir', function (User $user) {
            return $user->role === 'kasir' || $user->role === 'admin';
        });
    }
}
