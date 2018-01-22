<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Repositories\TagRepository as Tag;

class TagController extends Controller
{

    public function __construct( Tag $tag)
    {
    	$this->tag = $tag;
    }

    public function index()
    {
        $tags = $this->tag->all();
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
	    $result = $this->tag->create($request['name']);
        if($result){
            return Redirect('admin/tags')->with('success', '标签' . $request['name'] . '创建成功');
        }else{
            return Redirect('admin/tags')->withErrors('标签' . $request['name'] . '创建失败');
        }
    }

	public function edit( $id ) {
    	$tag = $this->tag->find($id);
		return view('admin.post.tags', compact('tag'));
    }

	public function update(  ) {
		
    }

	public function destroy(  ) {
		
    }

	public function show(  ) {
		
    }

	public function store(  ) {
		
    }
}
