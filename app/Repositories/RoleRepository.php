<?php
/**
 * Created by PhpStorm.
 * User: Slionx
 * Date: 2018/1/16
 * Time: 14:00
 */

namespace App\Repositories;


class RoleRepository extends BaseRepository {

	function model() {
		return "App\\Http\\Model\\Role";
	}

}