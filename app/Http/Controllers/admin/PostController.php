<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Matriphe\Imageupload\Imageupload;
use Validator;
use Image;

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
    public function upload_img(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'files' => 'required|image|mimes:jpeg,jpg,png|max:' . 2048,
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        /*$file = $request->avatar;
        var_dump($file);

        var_dump($request->file('avatar'));exit;*/
        //判断文件在请求中是否存在

        if ($request->hasFile('files')) {
            //判断文件在上传过程中是否出错
            $data = Imageupload::upload(Request::file('file'));

            //var_dump($path);
            exit(json_encode($data));
            if ($request->file('files')->isValid()) {

                //$path = $request->avatar->store('images');

                //$a= ImageuploadModel::upload(Request::file('file'));


            }
        }
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
