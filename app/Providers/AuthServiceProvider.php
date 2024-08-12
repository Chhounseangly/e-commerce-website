<?php

namespace App\Providers;

use App\Product;
use App\User;
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
     *s
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('product-delete', function (User $user, Product $product) {
            return $user->id === $product->user_id;
        });

        Gate::define('product-edit', function (User $user, Product $product) {
            return $user->id === $product->user_id;
        });

        Gate::define('product_type', function (User $user) {
            return $user->role_id === 1;
        });
    }
}
