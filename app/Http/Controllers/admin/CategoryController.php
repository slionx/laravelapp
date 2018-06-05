<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Repositories\CategoryRepository as Category;
use App\Repositories\PostRepository as Post;


class CategoryController extends Controller {

	public function __construct( Category $Category ,Post $post) {
		$this->CategoryRepository = $Category;
		$this->post = $post;
	}

	protected $module = 'category';


	/**
	 * Display index page.
	 *
	 * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
			[ 'data' => 'name', 'name' => 'name', 'title' => '分类名称' ],
			[ 'data' => 'count', 'name' => 'count', 'title' => '文章数量' ],
			[ 'data' => 'sort', 'name' => 'sort', 'title' => '排序' ],
			[ 'data' => 'created_at', 'name' => 'created_at', 'title' => trans( 'menu.created_at' ) ],
			[ 'data' => 'updated_at', 'name' => 'updated_at', 'title' => trans( 'menu.updated_at' ) ],
		] )->addAction( [ 'data' => 'action', 'name' => 'action', 'title' => trans( 'common.action' ) ] );;

		return view( 'Backend.category.index', compact( 'html' ) );

	}

	public function ajaxData() {
		return DataTables::of( $this->CategoryRepository->all() )
		                 ->addColumn( 'action', function ( $CategoryRepository ) {
			                 return getActionButtonAttribute( $CategoryRepository->id, $this->module );
		                 } )
		                 ->toJson();
	}

	public function show( Request $request ) {

	}

	public function create() {
		return view( 'Backend.category.create' );
	}

	public function store( Request $request ) {

		$validator = Validator::make( $request->all(), [
			'name' => 'required|unique:category|max:255',
			'sort' => 'required|numeric',
		] );
		if ( $validator->fails() ) {
			return back()
				->withErrors( $validator )
				->withInput( $request->all() );
		}
		if ( $this->CategoryRepository->create( $request->all() ) ) {
			return Redirect()->route('category.index')->with( 'success', '分类' . $request->name . '创建成功' );
		} else {
			return Redirect()->back()->with( 'error','分类' . $request->name . '创建失败' )->withInput($request->all());
		}
	}

	public function edit( $id ) {
		$category = $this->CategoryRepository->find($id);
		return view( 'Backend.category.edit',compact('category') );
	}

	public function update( Request $request ,$id ) {

		try {
			$bool       = $this->CategoryRepository->update($request->all(), $id );
			if ( $bool ) {
				return Redirect()->route('category.index')->with('success', '更新成功！');
			}
		} catch ( Exception $e ) {
			return Redirect()->back()->with('error','更新失败！'. $e->getMessage())->withInput($request->all());
		}
	}

	public function destroy( $id ) {
		try {
			if(count($this->post->findByField('post_category',$id)) > 0){
				return redirect()->back()->with('error','该分类下有对应文章，清先转移文章再删除！');
			}
			if($this->CategoryRepository->delete($id)){
				return redirect()->route('category.index')->with('success', '删除成功！');
			}else{
				return redirect()->back()->with('error','删除失败！');
			}
		} catch ( Exception $e ) {
			return redirect()->back()->with('error','删除失败！'. $e->getMessage());
		}
	}
}