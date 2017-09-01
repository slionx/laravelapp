<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.post.index');
    }
    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function tags()
    {
        return view('admin.tags');
    }
    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function upload()
    {
        return view('admin.post.upload');
    }
    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function image()
    {
        return view('admin.images');
    }
    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function post()
    {
        return view('admin.post');
    }
    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function categories()
    {
        return view('admin.categories');
    }

    public function create(){
        return view('admin.post.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:articles|max:255',
            //'cartgory' => 'required',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

    }
}
