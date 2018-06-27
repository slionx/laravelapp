<?php

namespace App\Http\Middleware;

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
        //$d = $request->user()->can('post.index',$request);

        return $next($request);
    }
}
