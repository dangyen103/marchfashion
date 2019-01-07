<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //user-manager
        Gate::define('user-manager', function($user){
            foreach ($user->adminitrator->roles as $role) {
                if ($role->code == 'adminitrator' || $role->code == 'userManager') {
                    return true;
                }
            }  
        });

        //prod-manager
        Gate::define('prod-manager', function($user){
            foreach ($user->adminitrator->roles as $role) {
                if ($role->code == 'adminitrator' || $role->code == 'prodManager') {
                    return true;
                }
            }  
        });

        //set-manager
        Gate::define('set-manager', function($user){
            foreach ($user->adminitrator->roles as $role) {
                if ($role->code == 'adminitrator' || $role->code == 'setManager') {
                    return true;
                }
            }  
        });

        //disc-manager
        Gate::define('disc-manager', function($user){
            foreach ($user->adminitrator->roles as $role) {
                if ($role->code == 'adminitrator' || $role->code == 'discManager') {
                    return true;
                }
            }  
        });

        //post-manager
        Gate::define('post-manager', function($user){
            foreach ($user->adminitrator->roles as $role) {
                if ($role->code == 'adminitrator' || $role->code == 'postManager') {
                    return true;
                }
            }  
        });

        //order-manager
        Gate::define('order-manager', function($user){
            foreach ($user->adminitrator->roles as $role) {
                if ($role->code == 'adminitrator' || $role->code == 'orderManager') {
                    return true;
                }
            }  
        });

        //order-confirmOrder
        Gate::define('confirmOrder', function($user){
            foreach ($user->adminitrator->roles as $role) {
                if ($role->code == 'adminitrator' || $role->code == 'confirmOrder') {
                    return true;
                }
            }  
        });

        //order-packingOrder
        Gate::define('packingOrder', function($user){
            foreach ($user->adminitrator->roles as $role) {
                if ($role->code == 'adminitrator' || $role->code == 'packingOrder') {
                    return true;
                }
            }  
        });

        //order-shippingOrder
        Gate::define('shippingOrder', function($user){
            foreach ($user->adminitrator->roles as $role) {
                if ($role->code == 'adminitrator' || $role->code == 'shippingOrder') {
                    return true;
                }
            }  
        });

        //category-manager
        Gate::define('adminitrator', function($user){
            foreach ($user->adminitrator->roles as $role) {
                if ($role->code == 'adminitrator') {
                    return true;
                }
            }  
        });
    }
}
