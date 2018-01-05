<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;


class RoleController extends Controller
{

	protected $module = 'role';

	public function __construct( Role $role ) {
		$this->role = $role;
	}

	
	public function ajaxData() {

		return DataTables::of( $this->role->all() )
		                 ->addColumn( 'action', function ( $permission ) {
			                 return getActionButtonAttribute($permission->id,$this->module);
		                 } )
		                 ->toJson();



		/*<<<Eof
			                 <a href="{$url}" class="btn btn-sm yellow-gold btn-outline filter-submit margin-bottom">
                             <i class="fa fa-edit"></i> 修改</a>


                             <a class="btn btn-sm red btn-outline filter-cancel">
                             <i class="fa fa-trash"></i> 删除</a>
Eof;*/
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index( Builder $builder )
	{
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
			[ 'data' => 'slug', 'name' => 'sort', 'title' => '规则' ],
			[ 'data' => 'created_at', 'name' => 'created_at', 'title' => trans( 'menu.created_at' ) ],
			[ 'data' => 'updated_at', 'name' => 'updated_at', 'title' => trans( 'menu.updated_at' ) ],
		] )->addAction( [ 'data' => 'action', 'name' => 'action', 'title' => trans( 'common.action' ) ] );;

		return view( 'admin.role.index', compact( 'html' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(  )
	{
		return view( 'admin.role.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make( $request->all(), [
			'name' => 'required|unique:roles|max:255',
			'slug' => 'required|max:255',
		] );
		if ( $validator->fails() ) {
			return back()
				->withErrors( $validator )
				->withInput( $request->all() );
		}
		if ( $this->role->create($request->all()) ) {
			return Redirect( 'admin/role/create' )->with( 'success', '创建成功' );
		} else {
			return Redirect( 'admin/role/create' )->withErrors( '规则' . $request->name . '创建失败' );
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		echo 'show';
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$role_permissionArray = [];
		$role_permission = Role::find($id)->permissions()->get();
		foreach ( $role_permission as $permission){
			$controller = explode('.',$permission->slug);
			$role_permissionArray[$controller[0]][] = $permission->name;
		}


		return view( 'admin.role.edit' ,compact('role_permissionArray'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		echo $id;
	}
}
