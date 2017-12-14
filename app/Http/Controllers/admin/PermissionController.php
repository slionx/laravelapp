<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Contracts\PermissionInterface;

class permissionController extends Controller
{

	public function __construct( PermissionInterface $permission  ) {
		$this->permission = $permission;
	}
    //
	public function create(  ) {
		return view( 'admin.permission.create' );
	}

	public function store( Request $request  ) {
		$validator = Validator::make( $request->all(), [
			'name' => 'required|unique:category|max:255',
			'slug' => 'required|max:255',
			'description' => 'required|max:255',
		] );
		if ( $validator->fails() ) {
			return back()
				->withErrors( $validator )
				->withInput( $request->all() );
		}
		if ( $this->permission->save($request->all()) ) {
			return Redirect( 'admin/permission/create' )->with( 'success', '创建成功' );
		} else {
			return Redirect( 'admin/permission/create' )->withErrors( '分类' . $request->name . '创建失败' );
		}
		
	}
}
