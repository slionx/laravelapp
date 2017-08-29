<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
