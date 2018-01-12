<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Contracts\CategoryInterface;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Repositories\CategoryRepository;


class CategoryController extends Controller {

	public function __construct( CategoryRepository $CategoryRepository ) {
		$this->CategoryRepository = $CategoryRepository;
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
			[ 'data' => 'name', 'name' => 'name', 'title' => '名称' ],
			[ 'data' => 'sort', 'name' => 'sort', 'title' => '排序' ],
			[ 'data' => 'created_at', 'name' => 'created_at', 'title' => trans( 'menu.created_at' ) ],
			[ 'data' => 'updated_at', 'name' => 'updated_at', 'title' => trans( 'menu.updated_at' ) ],
		] )->addAction( [ 'data' => 'action', 'name' => 'action', 'title' => trans( 'common.action' ) ] );;

		return view( 'admin.category.index', compact( 'html' ) );

	}

	public function ajaxData() {

		return DataTables::of( $this->CategoryRepository->all() )
		                 ->addColumn( 'action', function ( $CategoryRepository ) {
			                 return getActionButtonAttribute( $CategoryRepository->id, $this->module );
		                 } )
		                 ->toJson();
	}

	/**
	 * Process dataTable ajax response.
	 *
	 * @param \Yajra\Datatables\Datatables $datatables
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function data( Datatables $datatables ) {
		$builder = Category::query()->select( 'id', 'name', 'sort', 'created_at', 'updated_at' );

		return $datatables->eloquent( $builder )
		                  ->editColumn( 'name', function ( $user ) {
			                  return '<a>' . $user->name . '</a>';
		                  } )
		                  ->addColumn( 'action', 'eloquent.tables.users-action' )
		                  ->rawColumns( [ 'name', 'action' ] )
		                  ->make( true );
	}

	public function show( Request $request ) {


	}

	public function create() {
		return view( 'admin.category.create' );
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
		if ( $this->category->save( $request->all() ) ) {
			return Redirect( 'admin/category/create' )->with( 'success', '创建成功' );
		} else {
			return Redirect( 'admin/category/create' )->withErrors( '分类' . $request->name . '创建失败' );
		}
	}

	public function edit( $id ) {
		$category = $this->CategoryRepository->find($id);
		return view( 'admin.category.edit',compact('category') );
	}

	public function update( Request $request ,$id ) {
		try {
			$result       = $this->CategoryRepository->find( $id );
			$result->name = $request->name;
			$result->slug = $request->slug;
			$bool         = $result->save();
			if ( $bool ) {
				return redirect()->route( 'role.edit', $id );
			}
		} catch ( Exception $e ) {
			return back()->withErrors(' Failed! ' . $e->getMessage());
		}

	}


}