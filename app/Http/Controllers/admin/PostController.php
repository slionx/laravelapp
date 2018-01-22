<?php

namespace App\Http\Controllers\Admin;

use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Matriphe\Imageupload\Imageupload;
use Validator;
use Image;
use Illuminate\Auth\Middleware;
use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\TagRepository;
use App\Http\Model\Posts;
use App\Http\Model\User;


/**
 * Class PostController
 * @package App\Http\Controllers\Admin
 */
class PostController extends Controller {

	protected $CategoryRepository;
	protected $PostRepository;
	protected $module = 'post';

    public function __construct( CategoryRepository $CategoryRepository ,
	                             PostRepository $PostRepository,
	                             TagRepository $TagRepository
    ) {
        //$this->middleware('isadmin');
	    $this->CategoryRepository = $CategoryRepository;
	    $this->TagRepository = $TagRepository;
	    $this->post = $PostRepository;
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
		return DataTables::of( $this->post->all() )
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
            'categories' => $this->CategoryRepository->all(),
            'tags' => $this->TagRepository->all(),
        ] );
    }

    public function store(Request $request) {
	    $this->Validator( $request);
        $data['post_title']   = $request->post_title;
	    $data['post_content'] = $request->post_content;
	    $data['post_author']  = 'Slionx';
	    $data['comments_status']   = $request->comments_status;
	    $data['post_slug']    = title_case( str_slug( $request->post_slug, '-' ) );//slug标题自动大写 空格转-方便SEO


	    //$this->syncTag($request['post_tag']);

        if ( $this->post->create($data) ) {
            return Redirect( 'admin/post/create' )->with( 'success', 'success post' );
        } else {
            return Redirect( 'admin/post/create' )->withErrors( '文章' . $request['post_title'] . '创建失败' );
        }


    }

    /**
     *
     */
    public function show($id) {
        $post = Posts::find($id);
        return view('home.post.show',compact('post'));

    }




    public function edit($id) {
    	$post = $this->post->find($id);
	    $tags = $this->TagRepository->all();
	    $categories = $this->CategoryRepository->all();
	    return view('admin.post.edit',compact('post','tags','categories'));

    }

	public function Validator( $request ) {

		$rules = [
			'post_title'   => 'required|unique:posts|max:255',
			'post_slug'    => 'required',
			'post_content' => 'required',
			'category'     => 'required',
			'post_tag' => 'required',
			'comments_status' => 'required',
		];
		$messages = [
			'post_title.required'=>'标题不能为空',
			'post_title.max'=>'标题最长不能超过255字符',
			'post_slug.required'=>'slug不能为空',
			'category.required'=>'分类不能为空',
			'post_content.required'=>'文章内容不能为空',
			'post_tag.required'=>'至少选择一个标签',
		];
		$validator = Validator::make( $request->all(),$rules,$messages);
		if ( $validator->fails() ) {
			return back()->withErrors( $validator )->withInput();
		}
    }

	public function syncTag( $array=[],Posts $posts ) {
		$ids = [];
		$tags = $array['post_tag'];
		if (!empty($tags)) {
			foreach ($tags as $tagName) {
				$tag = Tag::firstOrCreate(['name' => $tagName]);
				array_push($ids, $tag->id);
			}
		}
		$posts->tags()->sync($ids);

    }

    /**
     *
     */
    public function update($id ,Request $request) {
    	$this->Validator( $request);

	    //$this->syncTag($request['post_tag']);

	    $data['post_title']   = $request->post_title;
	    $data['post_content'] = $request->post_content;
	    $data['post_author']  = 'Slionx';
	    $data['comments_status']   = $request->comments_status;
	    $data['post_slug']    = title_case( str_slug( $request->post_slug, '-' ) );//slug标题自动大写 空格转-方便SEO

	    if($this->post->update($data,$id)){
		    return redirect('admin/post/index')->with('success', '文章' . $request['post_title'] . '更新成功');
	    }else{
		    return Redirect::back()->withInput()->withErrors('errors','更新失败！');
	    }


    }

    /**
     * @param $id
     */
    public function destroy( $id ) {

	    if($this->post->delete($id)){
		    return Redirect::back()->with('success', '删除成功！');
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
	    $user = User::find(1);

	    foreach ($user->roles as $role) {
		    //echo $role;
	    }

        $post = $this->post->paginate( 1 );

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
