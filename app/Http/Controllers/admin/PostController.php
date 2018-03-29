<?php

namespace App\Http\Controllers\Admin;

use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Repositories\PostRepository as Post;
use App\Repositories\CategoryRepository as Category;
use App\Repositories\TagRepository as Tag;

use Matriphe\Imageupload\Imageupload;
use Image;
use Illuminate\Auth\Middleware;



/**
 * Class PostController
 * @package App\Http\Controllers\Admin
 */
class PostController extends Controller {

	protected $Category;
	protected $Post;
	protected $module = 'post';

    public function __construct( Category $Category ,
	                             Post $Post,
	                             Tag $Tag
    ) {
        //$this->middleware('isadmin');
	    $this->category = $Category;
	    $this->tag = $Tag;
	    $this->post = $Post;
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index( Builder $builder ) {
	    if ( request()->ajax() ) {
		    return $this->ajaxData();
	    }
	    $html = $builder->parameters( [
		    'searchDelay' => 350,
		    'language'    => [
			    'url' => url( 'zh.json' )
		    ],
	    ] )->columns( [
		    [ 'data' => 'id', 'name' => 'id', 'title' => trans( 'common.number' ) ],
		    [ 'data' => 'post_title', 'name' => 'post_title', 'title' => '标题' ],
		    [ 'data' => 'post_category', 'name' => 'post_category', 'title' => '分类' ],
		    [ 'data' => 'post_tag', 'name' => 'post_tag', 'title' => '标签' ],
		    [ 'data' => 'comments_status', 'name' => 'comments_status', 'title' => '评论状态' ],
		    [ 'data' => 'comments_count', 'name' => 'comments_count', 'title' => '评论数' ],
		    [ 'data' => 'followers_count', 'name' => 'followers_count', 'title' => '阅读数' ],
		    [ 'data' => 'created_at', 'name' => 'created_at', 'title' => trans( 'menu.created_at' ) ],
		    [ 'data' => 'updated_at', 'name' => 'updated_at', 'title' => trans( 'menu.updated_at' ) ],
	    ] )->addAction( [ 'data' => 'action', 'name' => 'action', 'title' => trans( 'common.action' ) ] );;

        return view( 'admin.post.index' , compact( 'html' ) );
    }

	public function ajaxData() {

		return DataTables::of(
			$this->post->scopeQuery(function($query){
				return $query->orderBy('id','asc');
			})->all()
		)
		                 ->addColumn( 'action', function ( $PostRepository ) {
			                 return getActionButtonAttribute( $PostRepository->id, $this->module );
		                 } )
		                 ->toJson();
	}

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        return view( 'admin.post.create', [
            'categories' => $this->category->all(),
            'tags' => $this->tag->all(),
        ] );
    }

    public function store(Request $request) {
    	if($this->Validator( $request))
	    {
	    	return $this->Validator( $request);
	    }

	    $request->post_slug   = title_case( str_slug( $request->post_slug, '-' ) );//slug标题自动大写 空格转-方便SEO

	    $result = auth()->user()->posts()->create($request->all());
        if ( !$result ) {
	        if(is_array($request->post_tag)){
		        foreach ($request->post_tag as $tag){
			        $tags[] = $this->tag->find($tag)->id;
		        }
		        $result->attachTag($tags);
	        }
            return Redirect::route( 'post.index' )->with( 'success', '文章' . $request['post_title'] . '创建成功' );
        } else {
            return Redirect::route( 'post.index' )->withErrors( '文章' . $request['post_title'] . '创建失败' );
        }


    }

    /**
     *
     */
    public function show($id) {
        $post = $this->post->find($id);
        return view('home.post.show',compact('post'));
    }




    public function edit($id) {
    	$post = $this->post->find($id);
	    $tags = $this->tag->all();
	    $categories = $this->category->all();
	    $tag = $post->getTag();
	    dd($tag);
	    return view('admin.post.edit',compact('post','tags','categories'));

    }

	public function Validator($request ) {

		$rules = [
			'post_title'   => 'required|unique:posts|max:255',
			'post_slug'    => 'required',
			'post_content' => 'required',
			'category'     => 'required',
			'post_tag' => 'required',
		];
		$messages = [
			'post_title.required'=>'标题不能为空',
			'post_title.max'=>'标题最长不能超过255字符',
			'post_slug.required'=>'slug不能为空',
			'category.required'=>'分类不能为空',
			'post_tag.required'=>'至少选择一个标签',
            'post_content.required'=>'文章内容不能为空',
		];
		$validator = Validator::make( $request->all(),$rules,$messages);
		if ( $validator->fails() ) {
			return back()->withErrors( $validator )->withInput();
		}
    }


    /**
     *
     */
    public function update($id ,Request $request) {
	    if($this->Validator( $request))
	    {
		    return $this->Validator( $request);
	    }

	    $request->post_slug    = title_case( str_slug( $request->post_slug, '-' ) );//slug标题自动大写 空格转-方便SEO

	    if($this->post->update($request->all(),$id)){
		    if(is_array($request->post_tag)){
			    foreach ($request->post_tag as $tag){
				    $tags[] = $this->tag->find($tag)->id;
			    }
			    $post = $this->post->find($id);
			    $post->syncTag($tags);
		    }

		    return Redirect::route('post.index')->with('success', '文章' . $request['post_title'] . '更新成功');
	    }else{
		    return Redirect::back()->withInput()->withErrors('errors','更新失败！');
	    }


    }

    /**
     * @param $id
     */
    public function destroy( $id ) {

	    if($this->post->delete($id)){
		    return Redirect::route('post.index')->with('success', '删除成功！');
	    }else{
		    return Redirect::back()->withInput()->with('errors','删除失败！');
	    }
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function tags() {
        return view( 'admin.tags' );
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function upload() {
        return view( 'admin.post.upload' );
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function image() {
        return view( 'admin.images' );
    }

    public function upload_img( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'files' => 'required|image|mimes:jpeg,jpg,png|max:' . 2048,
        ] );
        if ( $validator->fails() ) {
            return back()
                ->withErrors( $validator )
                ->withInput();
        }
        /*$file = $request->avatar;
        var_dump($file);

        var_dump($request->file('avatar'));exit;*/
        //判断文件在请求中是否存在

        if ( $request->hasFile( 'files' ) ) {
            //判断文件在上传过程中是否出错
            //$data = Imageupload::upload(Request::file('file'));

            if ( $request->file( 'files' )->isValid() ) {

                $path = $request->file( 'files' )->store( 'files' );

                //return $path;
                //var_dump($path);exit
                //return storage_path($path);

                $progress = array(
                    'files' => array(
                        'name'       => '0qg04YIPXeHx8kKm9qGa7nNVCkL68ihLzb3lL2KC.jpeg',
                        'size'       => false,
                        "type"       => "image/jpeg",
                        "error"      => "File upload aborted",
                        "deleteUrl"  => "http://l.cn../storage/files/0qg04YIPXeHx8kKm9qGa7nNVCkL68ihLzb3lL2KC.jpeg",
                        "deleteType" => "DELETE"

                    )
                );
                exit( json_encode( $progress ) );

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
    public function list() {

        $post = $this->post->paginate( 3 );

        return view( 'home.post.list', compact( 'post' ) );
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function categories() {
        return view( 'admin.categories' );
    }


}
