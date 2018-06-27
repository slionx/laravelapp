<?php

namespace App\Providers;

use App\Http\Model\User;
use App\Http\Model\Permission;
use function foo\func;
use Illuminate\Contracts\Auth\Access\Authorizable;
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
    public function boot(\Illuminate\Contracts\Auth\Access\Gate $gate)
    {

        $this->registerPolicies($gate);
        /*
        $permissions = $this->getPermissions();
        if($permissions){
            foreach ($permissions as $permission){
                $gate->define($permission->name,function (User $user) use ($permission){
                    return $user->hasRole($permission->roles);
                });
            }
        }*/

    }

    protected function getPermissions(  ) {
        $roles = Permission::with('roles')->get();
        return $roles ? $roles : [];
    }
}
