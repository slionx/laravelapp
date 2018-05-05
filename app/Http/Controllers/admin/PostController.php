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
use App\Http\Model\Posts;
use App\Http\Model\Tag as Tags;
use App\Repositories\CategoryRepository as Category;
use App\Repositories\UserRepository as User;
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

	public function __construct(
		Category $Category,
		Post $Post,
		Posts $posts,
		Tag $Tag,
		User $User
	) {
		$this->middleware( 'isadmin' )->except( 'list', 'show' );
		$this->category = $Category;
		$this->tag      = $Tag;
		$this->post     = $Post;
		$this->user     = $User;
	}

	/**
	 * Display a listing of the posts.
	 *
	 * @return Response
	 */
	public function index( Builder $builder ) {
		//dd(auth()->user()->isadmin());

		//dd($this->ajaxData());
		if ( request()->ajax() ) {
			return $this->ajaxData();
		}
		$html = $builder->parameters( [
			'searchDelay' => 350,
			'language'    => [
				'url' => url( 'zh.json' )
			],
		] )->addIndex( [ 'data' => 'DT_Row_Index', 'name' => 'DT_Row_Index', 'title' => '序号' ] )
		                ->columns( [
			                [ 'data' => 'id', 'name' => 'id', 'title' => trans( 'common.number' ) ],
			                [ 'data' => 'post_title', 'name' => 'post_title', 'title' => '标题' ],
			                [ 'data' => 'post_author', 'name' => 'post_author', 'title' => '作者' ],
			                /*[ 'data' => 'post_slug', 'name' => 'post_slug', 'title' => 'slug' ],*/
			                [ 'data' => 'post_category', 'name' => 'post_category', 'title' => '分类' ],
			                [ 'data' => 'post_tag', 'name' => 'post_tag', 'title' => '标签' ],
			                [ 'data' => 'comments_status', 'name' => 'comments_status', 'title' => '评论状态' ],
			                [ 'data' => 'comments_count', 'name' => 'comments_count', 'title' => '评论数' ],
			                [ 'data' => 'followers_count', 'name' => 'followers_count', 'title' => '阅读数' ],
			                [ 'data' => 'created_at', 'name' => 'created_at', 'title' => trans( 'menu.created_at' ) ],
			                [ 'data' => 'updated_at', 'name' => 'updated_at', 'title' => trans( 'menu.updated_at' ) ],
		                ] )->addAction( [
				'data'  => 'action',
				'name'  => 'action',
				'title' => trans( 'common.action' )
			] );

		return view( 'admin.post.index', compact( 'html' ) );
	}

	/**
	 * @return mixed
	 */
	public function ajaxData() {
		$tmp = $this->post->scopeQuery( function ( $query ) {
			return $query->orderBy( 'id', 'desc' );
		} )->all();

		if ( count( $tmp ) > 0 ) {
			foreach ( $tmp as $k => $v ) {
				$post[ $k ] = $v;

				if ( $v['post_category'] ) {
					$post[ $k ]['post_category'] = "<span class=\"label label-sm label-success\">" . $this->category->find( $v['post_category'] )->name . "</span>";
				}
				if ( $v['post_author'] ) {
					$post[ $k ]['post_author'] = $this->user->find( $v['post_author'] )->name;
				}
				$tags = $this->post->find( $v['id'] )->getTag();
				$tag  = '';
				if ( count( $tags ) > 1 ) {
					foreach ( $tags as $item ) {
						$tag .= "<a class=\"btn btn-success\"><i class=\"fa fa-tag\"></i> " . $item->name . "</a>";
					}
				} elseif ( count( $tags ) == 1 ) {
					$tag = "<a class=\"btn btn-success\"><i class=\"fa fa-tag\"></i> " . $tags[0]->name . "</a>";
				}
				//$tag = "<p>".$tag."</p>";
				$post[ $k ]['post_tag'] = $tag;
				if ( $v['comments_status'] == "on" ) {
					$post[ $k ]['comments_status'] = "<span class=\"label label-sm label-success\">" . $v->comments_status . "</span>";
				} else {
					$post[ $k ]['comments_status'] = "<span class=\"label label-sm label-danger\">" . $v->comments_status . "</span>";
				}
				$post[ $k ]['comments_count']  = "<span class=\"badge badge-success\">" . $v->comments_count . "</span>";
				$post[ $k ]['followers_count'] = "<span class=\"badge badge-success\">" . $v->followers_count . "</span>";
			}
		} else {
			$post = [];
		}

		return DataTables::of( $post )->escapeColumns( [] )->addIndexColumn()
		                 ->addColumn( 'action', function ( $PostRepository ) {
			                 $url = url( '/post', $PostRepository->id );

			                 return "<a target='_blank' href=\"{$url}\" title=\"查看\" class=\"btn green btn-sm btn-outline filter-submit margin-bottom\">
                             <i class=\"fa fa-eye\"></i></a>" . getActionButtonAttribute( $PostRepository->id, $this->module );
		                 } )->toJson();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create() {
		return view( 'admin.post.create', [
			'categories' => $this->category->all(),
			'tags'       => $this->tag->all(),
		] );
	}

	/**
	 * @param Request $request
	 *
	 * @return $this|PostController|\Illuminate\Http\RedirectResponse
	 */
	public function store( Request $request ) {
		if ( $this->Validator( $request ) ) {
			return $this->Validator( $request );
		}
		//$request['post_author'] = "Slionx";
		//$request->post_slug = title_case( str_slug( $request->post_slug, '-' ) );//slug标题自动大写 空格转-方便SEO
		$result = auth()->user()->posts()->create( $request->all() );
		if ( $result ) {
			if ( is_array( $request->post_tag ) ) {
				foreach ( $request->post_tag as $tag ) {
					$tags[] = $this->tag->find( $tag )->id;
				}
				$result->attachTag( $tags );
				$this->updateTagSum( $request->post_tag );
			}
			$this->updateCategorySum( $request->post_category );

			return redirect()->route( 'post.index' )->with( 'success', '文章' . $request['post_title'] . '创建成功' );
		} else {
			return redirect()->route( 'post.index' )->withErrors( '文章' . $request['post_title'] . '创建失败' );
		}
	}

	public function updateTagSum( $tags ) {
		foreach ( $tags as $tagid ) {
			$result = $this->tag->find( $tagid );
			$count  = $result->getTagSum();
			$this->tag->update( [ 'count' => $count ], $tagid );
		}
	}

	public function updateCategorySum( $category_id ) {
		$count = $this->post->findWhere( [ 'post_category' => $category_id ] )->count();
		$this->category->update( [ 'count' => $count ], $category_id );
	}




	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit( $id ) {
		$post       = $this->post->find( $id );
		$category   = $this->category->find( $post->post_category );
		$tags       = $this->tag->all();
		$categories = $this->category->all();
		$currentTag = $post->getTag();
		$tag        = '';
		foreach ( $currentTag as $k => $v ) {
			$tag .= "'$v->id'" . ',';
		}
		$tag = substr( $tag, 0, - 1 );

		return view( 'admin.post.edit', compact( 'post', 'category', 'tags', 'categories', 'tag' ) );

	}

	/**
	 * @param $request
	 *
	 * @return $this
	 */
	public function Validator( $request ) {

		$rules     = [
			'post_title'    => 'required|unique:posts|max:255',
			'post_slug'     => 'required',
			'post_content'  => 'required',
			'post_category' => 'required',
			'post_tag'      => 'required',
		];
		$messages  = [
			'post_title.required'   => '标题不能为空',
			'post_title.max'        => '标题最长不能超过255字符',
			'post_slug.required'    => 'slug不能为空',
			'category.required'     => '分类不能为空',
			'post_tag.required'     => '至少选择一个标签',
			'post_content.required' => '文章内容不能为空',
		];
		$validator = Validator::make( $request->all(), $rules, $messages );
		if ( $validator->fails() ) {
			return back()->withErrors( $validator )->withInput();
		}
	}


	/**
	 * @param $id
	 * @param Request $request
	 *
	 * @return $this|PostController|\Illuminate\Http\RedirectResponse
	 */
	public function update( $id, Request $request ) {
		$rules     = [
			'post_title'    => 'required|max:255',
			'post_slug'     => 'required',
			'post_content'  => 'required',
			'post_category' => 'required',
			'post_tag'      => 'required',
		];
		$messages  = [
			'post_title.required'   => '标题不能为空',
			'post_title.max'        => '标题最长不能超过255字符',
			'post_slug.required'    => 'slug不能为空',
			'category.required'     => '分类不能为空',
			'post_tag.required'     => '至少选择一个标签',
			'post_content.required' => '文章内容不能为空',
		];
		$validator = Validator::make( $request->all(), $rules, $messages );
		if ( $validator->fails() ) {
			return back()->withErrors( $validator )->withInput();
		}
		//$request['post_author'] = "Slionx";
		//$request->post_slug = title_case( str_slug( $request->post_slug, '-' ) );//slug标题自动大写 空格转-方便SEO
		if ( $this->post->update( $request->all(), $id ) ) {
			if ( is_array( $request->post_tag ) ) {
				foreach ( $request->post_tag as $tag ) {
					$tags[] = $this->tag->find( $tag )->id;
				}
				$post = $this->post->find( $id );
				$post->syncTag( $tags );
				$this->updateTagSum( $request->post_tag );
			}
			$this->updateCategorySum( $request->post_category );

			return redirect()->route( 'post.index' )->with( 'success', '文章' . $request['post_title'] . '更新成功' );
		} else {
			return redirect()->back()->withInput()->withErrors( 'errors', '更新失败！' );
		}
	}


	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy( $id ) {
		try {
			if ( $this->post->delete( $id ) ) {
				return redirect()->route( 'post.index' )->with( 'success', '删除成功！' );
			} else {
				return redirect()->back()->with( 'error', '删除失败！' );
			}
		} catch ( Exception $e ) {
			return redirect()->route( 'post.index' )->with( 'error', '删除失败！' . $e->getMessage() );
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
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show( $id ) {
		//$post = $this->post->find( $id );

		$post = Posts::with( [
			'category' => function ( $query ) {
				$query->select( 'id', 'name' );
			}
		] )->with( [
			'tag' => function ( $query ) {
				$query->select( 'id', 'name' );
			}
		] )->with( [
			'user' => function ( $query ) {
				$query->select( 'id', 'name' );
			}
		] )->orderBy( 'created_at', 'desc' )->findOrFail( $id, [
			'id',
			'post_author',
			'post_title',
			'post_content',
			'post_category',
			'comments_count',
			'followers_count',
			'post_password',
			'created_at'
		] );
		if($post->post_password && $post->post_author != auth()->user()->id ){
			return redirect()->route( 'post.list' );
		}

		$followers_count = $post->followers_count + 1;
		$this->post->update( ['followers_count'=>$followers_count], $id );
		$tags       = $this->tag->all( [ 'id', 'name', 'count' ] );
		$categories = $this->category->all( [ 'id', 'name', 'count' ] );

		$hot = Posts::orderBy( 'followers_count', 'desc' )->take(3)->get(['id','post_title','followers_count']);

		$prev_post = Posts::where( 'id', '<', $id )->first( [ 'id', 'post_title' ] );
		$prev_post = $prev_post ? $prev_post : '';
		$next_post = Posts::where( 'id', '>', $id )->first( [ 'id', 'post_title' ] );
		$next_post = $next_post ? $next_post : '';

		return view( 'desktop.post.show', compact( 'post', 'tags', 'categories', 'prev_post', 'next_post','hot' ) );
	}

	/**
	 * @param $id
	 * @param $t
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function list( $param = null, $id = null, Request $request ) {
		//dd($request);
		if ( $param == 'tag' ) {
			$post = Tags::findOrFail( $id, [ 'id' ] )->getPosts();
		} else {
			$post = Posts::with( [
				'category' => function ( $query ) {
					$query->select( 'id', 'name' );
				}
			] )->with( [
				'tag' => function ( $query ) {
					$query->select( 'id', 'name' );
				}
			] )->with( [
				'user' => function ( $query ) {
					$query->select( 'id', 'name' );
				}
			] )->orderBy( 'created_at', 'desc' )->
			where( function ( $query ) use ( $request, $param, $id ) {
				$keyword = trim( $request->keyword );
				if ( $keyword ) {
					$key = "%$keyword%";
					$query->where( 'post_title', 'like', $key )->orWhere( 'post_slug', 'like', $key );
				}
				if ( $param == "category" ) {
					$query->where( 'post_category', '=', $id );
				}
			} )->paginate( 4, [
				'id',
				'post_author',
				'post_title',
				'post_slug',
				'post_content',
				'post_category',
				'comments_count',
				'followers_count',
				'post_password',
				'created_at'
			] );
		}

		$hot = Posts::orderBy( 'followers_count', 'desc' )->take(3)->get(['id','post_title','followers_count']);
		//dd($hot);

		$tags       = $this->tag->all( [ 'id', 'name', 'count' ] );
		$categories = $this->category->all( [ 'id', 'name', 'count' ] );

		return view( 'desktop.post.list', compact( 'post', 'tags', 'categories','hot' ) );
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
