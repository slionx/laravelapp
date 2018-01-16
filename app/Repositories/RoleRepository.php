<?php
/**
 * Created by PhpStorm.
 * User: Slionx
 * Date: 2018/1/16
 * Time: 14:00
 */

namespace App\Repositories;

use App\Http\Model\Role;
use App\Http\Model\Permission;


class RoleRepository extends Repository {

	function model() {
		return Role::class;
	}

	function a(){
		$this->model()->permissions();
	}




}