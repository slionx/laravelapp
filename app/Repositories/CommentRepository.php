<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class CommentRepository extends BaseRepository
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return "App\\Http\\Model\\Comment";
	}
}
