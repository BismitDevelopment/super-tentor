<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

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

        //Gates
        Gate::before(function ($user, $ability){
            if($user->role_id === 1){
                return true;
            }
        });
        
        Gate::define('isPremium', function ($user){
            if($user->role_id === 3 || $user->role_id === 1){
                return Response::allow();
            } else {
                return Response::deny('You are not a Premium User');
            }
        });
    }
}
