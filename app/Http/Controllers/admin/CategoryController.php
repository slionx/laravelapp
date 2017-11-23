<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;



class CategoryController extends Controller
{
    public function index()
    {
        //$category = new Category;
	    //return $categorise = $category->all()->toJson();
        //return view('admin.categories', compact('categorise'));
	    return view('admin.categories');

    }

    public function show(){
	    $category = new Category;
	    $count = $category->count();
	    $data = $category->where()->all();
	    $output['data'] = $data;
	    $output['draw'] = $count;

	    return json_encode($output);


    }

    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:category|max:255',
            'sort' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->all());
        }
        $category = new Category;
        $category->name = $request->input('name');
        $category->sort = $request->input('sort');
        $result = $category->save();

   /*     save([
            'name'=>$request->input('name'),
            'sort'=>$request->input('sort'),
        ]);*/
        echo 'sucess';

    }


}