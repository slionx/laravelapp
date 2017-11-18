<?php

namespace App\Services\Admin;

use App\Repositories\MenuRepository;

class MenuServices{

	protected $model = 'menu';


	public function all(){
		return $menus = MenuRepository::getNumber();

	}



}