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
        view()->share('menu',$this->getMenu());
        view()->share('menuName',$this->getMenuName());

        return $next($request);
    }
    public function object2array(&$object) {
        $object =  json_decode( json_encode( $object),true);
        return  $object;
    }

    public function getMenuName(){
        $str = str_replace('/admin/', '', $_SERVER['REQUEST_URI']);
        if(strpos($str,'/')){
            $url = explode('/',$str);
            $url[1] = $url[0].'/'.$url[1];

        }else{
            $url[0] = 0;
            $url[1] = 0;

        }

        return $url;

    }

    public function getMenu(){
        //$menu = new Menu();
        //$menu = $menu->all();
        $menu  = DB::table('menu')->select('id','menu_name','display_name','parentid','icon')->get();
        $menu = $this->object2array($menu);
        $tmp = [];
        $arr = [];

        foreach ($menu as $k=> $v){
            if($v['parentid'] == 0){
                $tmp['head'][] = $v;
                foreach ($menu as $vv){
                    if($v['id'] == $vv['parentid']){
                        $arr[] = $vv;
                    }
                }
                $tmp['body'][$v['id']] = $arr;
                unset($arr);
            }
        }
        return $tmp;

    }
}
