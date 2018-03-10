<?php

namespace App\Providers;

use App\Employee;
use App\Role;
use App\Policies\EmployeePolicy;
use App\Policies\RolePolicy;
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
        Employee::class=>EmployeePolicy::class,
        Role::class=>RolePolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('view-hr', function ($user) {
            
            return $user->hasAccess(['view-hr']);
        });
        Gate::define('view-fam', function ($user) {
            
            return $user->hasAccess(['view-fam']);
        });
        Gate::define('view-fcy', function ($user) {
            
            return $user->hasAccess(['view-fam']);
        });
        Gate::define('view-sms', function ($user) {
            
            return $user->hasAccess(['view-sms']);
        });
        Gate::define('create-sms', function ($user) {
            
            return $user->hasAccess(['create-sms']);
        });
        Gate::define('view-vms', function ($user) {
            
            return $user->hasAccess(['view-vms']);
        });
        Gate::define('create-user', function ($user) {
            
            return $user->hasAccess(['create-user']);
        });
    }


}
