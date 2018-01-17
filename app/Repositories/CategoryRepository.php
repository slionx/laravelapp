<?php

namespace App\Repositories;

use App\Http\Model\Category;

class CategoryRepository extends Repository
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return Category::class;
	}
}
