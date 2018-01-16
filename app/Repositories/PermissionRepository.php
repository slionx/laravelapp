<?php

namespace App\Repositories;


use App\Http\Model\Permission;


class PermissionRepository extends Repository
{
	function model() {
		return Permission::class;
	}

}
