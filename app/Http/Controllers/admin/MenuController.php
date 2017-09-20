<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index(){
        $menu = new Menu;
        $menu = $menu->all();
        return view('admin.menu', compact('menu'));
        //return view('admin.menu');
    }


    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'menu_name' => 'required|unique:menu|max:255',
            'menu_type' => 'required|numeric',
            'parentid' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->all());
        }
        $menu = new Menu;
        $menu->menu_name = $request->input('menu_name');
        $menu->menu_type = $request->input('menu_type');
        $menu->parentid = $request->input('parentid');
        $result = $menu->save();

        /*     save([
                 'name'=>$request->input('name'),
                 'sort'=>$request->input('sort'),
             ]);*/
        echo 'sucess';

    }
}
