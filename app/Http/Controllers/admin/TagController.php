<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Model;

class TagController extends Controller
{
    protected $tag;

    public function __construct()
    {
    }

    public function index()
    {
        $tags = new Tag();
        $tags = $tags->all();
        return view('admin.post.tags', compact('tags'));
    }
    public function create(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:tags|max:255',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->all());
        }
        $tag = new Tag;
        $tag->name = $request->input('name');
        $result = $tag->save();

        /*     save([
                 'name'=>$request->input('name'),
                 'sort'=>$request->input('sort'),
             ]);*/
        echo 'sucess';

    }
}
