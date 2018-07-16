<?php

namespace App\Http\Middleware;

use App\Http\Model\Role;
use Route;
use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $routeName = Route::currentRouteName();

        $getRole= auth()->user()->getOwnRole();
        if($getRole != null){
            $permissions = Role::findOrFail($getRole->id)->getPermission();  //role_id
            if(!$permissions){
                return redirect()->back()->with('error', '没有此模块权限');
            }else{
                foreach ($permissions as $permission) {
                    $permission_arr[] = $permission->name;
                }
                if(in_array($routeName,$permission_arr)){
                    return $next($request);
                }else{
                    return redirect()->back()->with('error', '没有此模块权限');
                }
            }
        }else{
            abort(401);
        }
        //$d = $request->user()->can('post.index',$request);
    }
}
