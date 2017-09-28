<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Http\Model\Menu;
use Illuminate\Support\Facades\DB;

class Getmenu
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
        var_dump($this->getMenu());

        view()->share('menu',$this->getMenu());
        return $next($request);
    }
    function object2array(&$object) {
        $object =  json_decode( json_encode( $object),true);
        return  $object;
    }

    public function getMenu(){
        //$menu = new Menu();
        //$menu = $menu->all();
        $menu  = DB::table('menu')->select('id','menu_name','menu_type','parentid')->get();
        $menu = $this->object2array($menu);
        $nav = [];
        //$menu['top'] = [];
        foreach ($menu as $k =>$v){
            if($v['parentid'] == 0){
                $nav[] = $v['id'];
                //$menu['top'] = $v['id'];
            }else{
                //$nav['body'][] = $v;
            }
        }
        $menu['open'] = array_values ($nav);
        return $menu;

    }
}
