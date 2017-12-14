<?php

namespace App\Repositories;


use App\Contracts\PermissionInterface;
use App\Http\Model\Permission;


class PermissionRepository implements PermissionInterface
{



	public function all() {
		return Permission::all();
	}

	public function find( $id ) {
    	return Permission::find($id);
	}

	public function save( $data ) {
		return Permission::create($data);
	}

}
