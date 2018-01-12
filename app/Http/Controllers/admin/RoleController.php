<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Role;
use App\Http\Model\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;


class RoleController extends Controller
{

	protected $module = 'role';

	public function __construct( Role $role , Permission $permission ) {
		$this->role = $role;
        $this->permission = $permission;
	}

	
	public function ajaxData() {

		return DataTables::of( $this->role->all() )
		                 ->addColumn( 'action', function ( $permission ) {
			                 return getActionButtonAttribute($permission->id,$this->module);
		                 } )
		                 ->toJson();
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
		$permissions = $this->permission->all('id','name','slug');
		if ($permissions->isNotEmpty()) {
			foreach ($permissions as $v) {
				$temp = explode('.', $v->slug);
				$permissionArray[$temp[0]][] = $v->toArray();
			}
		}
		return view( 'admin.role.create',compact('permissionArray') );
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
			'permission'=> 'required',
		] );
		if ( $validator->fails() ) {
			return back()
				->withErrors( $validator )
				->withInput( $request->all() );
		}
		$result = $this->role->create($request->all());

		if ( $result ) {
			if($request->permission){
				foreach ($request->permission as $permission){
					$result->givePermission($this->permission->find($permission));
				}
			}

			return Redirect( 'admin/role/create' )->with( 'success', '创建成功' );
		} else {
			return Redirect( 'admin/role/create' )->withErrors( '角色' . $request->name . '创建失败' );
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


		$permissionArray = [];
		$array = [];
		$role = $this->role->find($id);
		$role_permission = Role::find($id)->permissions()->get();
		foreach ( $role_permission as $permission){
			$array[] = $permission->toArray();
		}
		$role_permissionArray = array_column($array,'id');

        $permissions = $this->permission->all('id','name','slug');
		if ($permissions->isNotEmpty()) {
			foreach ($permissions as $v) {
				$temp = explode('.', $v->slug);
				$permissionArray[$temp[0]][] = $v->toArray();
			}
		}


		return view( 'admin.role.edit' ,compact('role_permissionArray','permissionArray','role'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request ,Role $role)
	{
		try {
			$bool = $role->update($request->all());
			if ($bool) {
				// 更新角色权限关系
				if (isset($request->permission)) {
					$role->permissions()->sync($request->permission);
				}else{
					$role->permissions()->sync([]);
				}
			}
			return redirect()->route($this->module.'.edit',$role->id);
		} catch ( Exception $e ) {
			return back()->withErrors(' Failed! ' . $e->getMessage());
		}



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
