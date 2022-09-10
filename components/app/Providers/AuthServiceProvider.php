<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\Policy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Define an admin user role
        Gate::define('isAdmin', function(User $user)
        {
            if ($user->role == 'admin') {
                return true;
            }
            return false;
        });

        Gate::define('isModerator', function(User $user)
        {
            if ($user->role == 'moderator') {
                return true;
            }
            return false;
        });
    }
}
