<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Category;
use Illuminate\Database\Eloquent\Model;



class CategoryController extends Controller
{
    //

    public function index()
    {
        $category = new Category;
        $categorise = $category->all();
        return view('admin.categories', compact('categorise'));

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
        $category->save();

   /*     save([
            'name'=>$request->input('name'),
            'sort'=>$request->input('sort'),
        ]);*/

        echo 'sucess';

    }


}