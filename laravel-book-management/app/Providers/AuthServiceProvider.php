<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /* define a admin taikhoan role */
        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });

        /* define a manager taikhoan role */
//        Gate::define('isManager', function($User) {
//            return $User->role == 'manager';
//        });

        /* define a taikhoan role */
        Gate::define('isUser', function($user) {
            return $user->role == 'User';
        });
        //
    }
}
