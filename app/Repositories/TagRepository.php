<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class TagRepository extends BaseRepository
{
	function model() {
		return "App\\Http\\Model\\Tag";
	}
}
