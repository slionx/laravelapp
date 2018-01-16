<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository as Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MenuController extends Controller
{
	public function __construct( Menu $menu ) {
		$this->menu = $menu;
	}

    public function index(){
        $result = $this->menu->all();
        return view('admin.menu.index', compact('result'));
    }
    public function show(){
        //$menu = new Menu;
        $result = Menu::all();
        return view('admin.menu.index', compact('result'));
        //return view('admin.menu');
    }

	public function create() {
		return view( 'admin.menu.create' );
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
	    $result = $this->menu->create($request->all());
	    if($result){
		    return Redirect('admin/menu/create')->with('success', '' . $request['name'] . '创建成功');
	    }else{
		    return Redirect('admin/menu/create')->withErrors('' . $request['name'] . '创建失败');
	    }

    }
    public function edit($id){
    	$menu = $this->menu->find($id);
        return view('admin.menu.edit',compact('menu'));
    }
    public function update(Request $request , $id){

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
	    $result = $this->menu->update($request->all(),$id);
	    if($result){
		    return Redirect('admin/menu/edit')->with('success', '' . $request['name'] . '修改成功');
	    }else{
		    return Redirect('admin/menu/edit')->withErrors('' . $request['name'] . '修改失败');
	    }

    }
    public function destroy($id){
	    $result = $this->menu->delete($id);
    }
}
