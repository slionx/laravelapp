<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Repositories\RoleRepository as Role;
use App\Repositories\PermissionRepository as Permission;


class RoleController extends Controller
{

	protected $module = 'role';

	public function __construct( Role $role , Permission $permission ) {
		$this->role = $role;
        $this->permission = $permission;
	}

	
	public function ajaxData() {

		return DataTables::of( $this->role->all() )
		                 ->addColumn( 'action', function ( $role ) {
			                 return getActionButtonAttribute($role->id,$this->module);
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
			[ 'data' => 'slug', 'name' => 'slug', 'title' => '名称' ],
			[ 'data' => 'name', 'name' => 'name', 'title' => '规则' ],
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

		$permissions = $this->permission->all(['id','name','slug']);
		if ($permissions->isNotEmpty()) {
			foreach ($permissions as $v) {
				$temp = explode('.', $v->name);
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
			'name' => 'required|max:255',
			'slug' => 'required|unique:roles|max:255',
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

			return Redirect( 'admin/role' )->with( 'success', '角色 ' . $request->name .' 创建成功' );
		} else {
			return Redirect( 'admin/role/create' )->withInput()->withErrors( '角色 ' . $request->name . ' 创建失败' );
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
		$role = $this->role->find($id);
		$role_permission = $role->getPermission();
		if($role_permission){
			foreach ( $role_permission as $permission){
				$role_permissionArray[] = $permission->id;
			}
		}else{
			$role_permissionArray = [];
		}

        $permissions = $this->permission->all(['id','name','slug']);
		if ($permissions->isNotEmpty()) {
			foreach ($permissions as $v) {
				$temp = explode('.', $v->name);
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
	public function update(Request $request ,$id)
	{
		try {
			$bool = $this->role->update($request->all(),$id);
			if ($bool) {
				if(is_array($request->permission)){
					foreach ($request->permission as $pid){
						$permissions[] = $this->permission->find($pid)->id;
					}
					$role = $this->role->find($id);
					$role->syncPermission($permissions);
				}
			}
			if($bool){
				return redirect('admin/'.$this->module)->with( 'success', '更新成功' );
			}else{
				return Redirect::back()->with('error','更新失败！');
			}

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
		$role = $this->role->find($id);
		$user = $role->roleHasUser($id);
		if($user){
			return redirect()->back()->with('error','该角色下有对应用户，无法删除！');
		}else{
			$permissions = [];
			$rolePermission = $role->getPermission();
			foreach ($rolePermission as $v){
				$permissions[] = $v->id;
			}
			if($permissions){
				if($role->deletePermission($permissions)){
					if($this->role->delete($id)){
						return redirect()->route('role.index')->with('success', '删除成功！');
					}
				}
			}else{
				if($this->role->delete($id)){
					return redirect()->route('role.index')->with('success', '删除成功！');
				}
			}
		}
	}

}
