<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Category;
use App\Http\Model\Posts;
use Illuminate\Support\Facades\Redirect;
use Matriphe\Imageupload\Imageupload;
use Validator;
use Image;

/**
 * Class PostController
 * @package App\Http\Controllers\Admin
 */
class PostController extends Controller {
	protected $category;
	protected $post;

	public function __construct() {
		$this->category = new Category();
		$this->category = $this->category->orderBy( 'sort', 'asc' )->get();
		$this->post     = new Posts();

	}

	/**
	 * Display a listing of the posts.
	 *
	 * @return Response
	 */
	public function index() {
		return view( 'admin.index' );

		/*        return view('admin.post.index',[
					'categories'=>$this->category
				]);*/

	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create() {
		return view( 'admin.post.create', [
			'categories' => $this->category,
		] );
	}

	public function store( Request $request ) {
		$validator = Validator::make( $request->all(), [
			'post_title'   => 'required|unique:posts|max:255',
			'post_slug'    => 'required',
			'category'     => 'required',
			'post_content' => 'required',
		] );
		if ( $validator->fails() ) {
			return back()->withErrors( $validator )->withInput();
		}

		$this->post->post_title   = $request->post_title;
		$this->post->post_content = $request->post_content;
		$this->post->post_author  = 'Slionx';
		$this->post->post_slug    = title_case( str_slug( $request->post_slug, '-' ) );//slug标题自动大写 空格转-方便SEO


		if ( $this->post->save() ) {
			return Redirect( 'admin/post/create' )->with( 'success', 'success post' );
		} else {
			return Redirect( 'admin/post/create' )->withErrors( '文章' . $request['post_title'] . '创建失败' );
		}
		/*        $article->save([
					'title'=>$request->title,
					'content'=>$request->content
				]);*/

	}

	/**
	 *
	 */
	public function show($id) {
		$post = Posts::find($id);
		//echo $post->post_title;
		return view('post.show',compact('post'));

	}

	public function edit() {

	}

	/**
	 *
	 */
	public function update() {

	}

	/**
	 * @param $id
	 */
	public function destroy( $id ) {

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
	public function post() {
		$post = $this->post->paginate( 10 );

		return view( 'admin.post.post', compact( 'post' ) );
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
