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
	    $tmp = [];
	    $str = str_replace('/admin/', '', $_SERVER['REQUEST_URI']);
	    if(strpos($str,'/')){
		    $tmp['url_keyword'] = explode('/',$str);
	    }else{
		    $tmp['url_keyword'][0] = false;
		    $tmp['url_keyword'][1] = false;
	    }
	    //var_dump($tmp);exit;

        //$menu = new Menu();
        //$menu = $menu->all();
        $menu  = DB::table('menu')->select('id','menu_name','display_name','parentid','icon')->get();
        $menu = $this->object2array($menu);

        $arr = [];


        foreach ($menu as $k => $v){
	        if($v['parentid'] == 0){
		        $tmp['head'][] = $v;
	        }else{
		        foreach ($menu as $kk => $vv){
		        	if($v['parentid'] == $vv['id']){
				        //var_dump($vv);

				        if(strpos($v['menu_name'],'/')){
					        $v['menu_keyword'] = explode('/',$v['menu_name']);
				        }else{
					        $v['menu_keyword'] =  false;
				        }

				        $tmp['body'][$vv['id']][] = $v;
			        }
		        }
	        }
        }
	    //dd($tmp);
	    //exit;




/*        foreach ($menu as $k=> $v){
            if($v['parentid'] == 0){
                $tmp['head'][] = $v;
                foreach ($menu as $vv){
	                //当二级菜单父级 ID 等于一级 ID 时
                    if($v['id'] == $vv['parentid']){
	                    if(strpos($vv['menu_name'],'/')){
		                    $vv['menu_keyword'] = explode('/',$vv['menu_name']);
		                    if($vv['menu_keyword'][1]){

		                    }else{
			                    $vv['menu_keyword'][1] = false;
		                    }
	                    }
                        $arr[] = $vv;
	                    var_dump($arr);
                    }else{

                    	//一级菜单下没有二级菜单时
	                    //$zxc['arr'][1] = false;
	                    //$arr[]['arr'][1] = false;
                    }

                }
                //var_dump($arr);
                $tmp['body'][$v['id']] = $arr;
                //unset($arr);
            }
        }*/
        return $tmp;

    }
}
