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
        return view('admin.layouts.sidebar', compact('menu'));
        //return view('admin.menu');
    }
    public function show(){
        $menu = new Menu;
        $result = $menu->all();
        return view('admin.menu', compact('result'));
        //return view('admin.menu');
    }


    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'menu_name' => 'bail|required',
            'display_name' => 'bail|required|unique:menu|max:255',
            'parentid' => 'bail|required|numeric',
            'icon' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->all());
        }
        $menu = new Menu;
        $menu->menu_name = $request->input('menu_name');
        $menu->display_name = $request->input('display_name');
        $menu->parentid = $request->input('parentid');
        $menu->icon = $request->input('icon');
        $result = $menu->save();

        /*     save([
                 'name'=>$request->input('name'),
                 'sort'=>$request->input('sort'),
             ]);*/
        echo 'sucess';

    }
}
