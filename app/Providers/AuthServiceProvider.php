<?php

namespace App\Providers;

use App\Http\Model\Post;
use App\Http\Model\User;
use App\Http\Model\Permission;
use App\Policies\PostPolicy;
//use function foo\func;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
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
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {

        $this->registerPolicies($gate);
/*        $gate->define('update', function ($user, $post) {
            return $user->id == $post->post_author;
        });*/

  /*      $permissions = $this->getPermissions();
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
