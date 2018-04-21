<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

        Gate::define('config', function($user) {
            return $user->hasAccess('config');
        });

        $data = User::keypermission();

        foreach ($data as $list) {
            foreach ($list['data'] as $list2) {
                Gate::define( $list2['value'] , function($user) use ($list2) {
                    return $user->hasAccess( $list2['value'] );
                });
            }
        }
    }
}
