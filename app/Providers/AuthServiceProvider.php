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

        Gate::resource('posts', 'App\Policies\PostPolicy');
        Gate::define('roles', 'App\Policies\PostPolicy@role');
        Gate::define('permissions', 'App\Policies\PostPolicy@permission');
        Gate::define('admin.update', 'App\Policies\PostPolicy@adminUpdate');
        Gate::define('admin.delete', 'App\Policies\PostPolicy@adminDelete');
        Gate::define('admin.create', 'App\Policies\PostPolicy@adminCreate');
    }
}
