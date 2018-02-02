<?php

namespace App\Repositories;


use Prettus\Repository\Eloquent\BaseRepository;

class PermissionRepository extends BaseRepository
{
	function model() {
		return "App\\Http\\Model\\Permission";
	}

}
