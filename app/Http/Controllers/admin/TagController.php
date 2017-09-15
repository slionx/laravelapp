<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Model;
use App\Http\Model\tag;

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
        //var_dump($request);exit;
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
        //$result = $tag->save();
        if($tag->save()){
            return Redirect('admin/tags')->with('success', '标签' . $request['name'] . '创建成功');
        }else{
            return Redirect('admin/tags')->withErrors('标签' . $request['name'] . '创建失败');
        }

        /*     save([
                 'name'=>$request->input('name'),
                 'sort'=>$request->input('sort'),
             ]);*/
        echo 'success';

    }
}
