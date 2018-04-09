<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Repositories\PermissionRepository;

class permissionController extends Controller
{
	protected $module = 'permission';


	public function __construct( PermissionRepository $permission  ) {
		$this->permission = $permission;
	}

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
			[ 'data' => 'slug', 'name' => 'sort', 'title' => '权限' ],
			[ 'data' => 'description', 'name' => 'sort', 'title' => '简介' ],
			[ 'data' => 'created_at', 'name' => 'created_at', 'title' => trans( 'menu.created_at' ) ],
			[ 'data' => 'updated_at', 'name' => 'updated_at', 'title' => trans( 'menu.updated_at' ) ],
		] )->addAction( [ 'data' => 'action', 'name' => 'action', 'title' => trans( 'common.action' ) ] );;

		return view( 'admin.permission.index', compact( 'html' ) );
	}

	public function ajaxData() {

		return DataTables::of( $this->permission->all() )
		                 ->addColumn( 'action', function ( $permission ) {
			                 return getActionButtonAttribute( $permission->id,$this->module);
		                 })
		                 ->toJson();
	}

	public function create(  ) {
		return view( 'admin.permission.create' );
	}

	public function store( Request $request  ) {
		$validator = Validator::make( $request->all(), [
			'name' => 'required|unique:permissions|max:255',
			'slug' => 'required|max:255',
			'description' => 'required|max:255',
		] );
		if ( $validator->fails() ) {
			return back()
				->withErrors( $validator )
				->withInput( $request->all() );
		}
		if ( $this->permission->create($request->all()) ) {
			return Redirect( 'admin/permission/create' )->with( 'success', '创建成功' );
		} else {
			return Redirect( 'admin/permission/create' )->withErrors( '权限' . $request->name . '创建失败' );
		}
	}

	public function show(  ) {
		
	}

	public function edit( $id ) {
		$permission = $this->permission->find($id);
		return view( 'admin.permission.edit' ,compact('permission','id'));
	}

	/**
	 * @param Request $request
	 * @param $id
	 *
	 * @return $this|\Illuminate\Http\RedirectResponse
	 */
	public function update( Request $request, $id ) {
		try {
			$validator = Validator::make( $request->all(), [
				'name' => 'required|max:255',
				'slug' => 'required|max:255',
				'description' => 'required|max:255',
			] );
			if ( $validator->fails() ) {
				return back()
					->withErrors( $validator )
					->withInput( $request->all() );
			}
			$permission = $this->permission->find($id);
			$permission->name = $request->name;
			$permission->slug = $request->slug;
			$permission->description = $request->description;
			$bool = $permission->save();
			if($bool){
				return Redirect( 'admin/permission/' )->with( 'success', '更新成功' );
			} else {
				return redirect()->route('permission.edit',$id)->withInput()->withErrors( '更新失败,请稍后重试！' );
			}
		} catch ( Exception $e ) {
			return redirect()->route('permission.edit',$id)->withInput()->withErrors( $e->getMessage() );
		}
	}

	/**
	 * @param $id
	 */
	public function destroy($id)
	{
		try {
			$result = $this->permission->delete($id);
			if($result){
				return redirect()->route('role.index')->with('success', '删除成功！');
			}else{
				return redirect()->route('role.index')->with('error', '删除失败！');
			}
		} catch (Exception $e) {
			return redirect()->route('role.index')->with('error', '删除失败！'.$e->getMessage());
		}
	}
}
