<?php

namespace App\Repositories;


use App\Http\Model\Menu;

class MenuRepository extends Repository
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return Menu::class;
	}
}
