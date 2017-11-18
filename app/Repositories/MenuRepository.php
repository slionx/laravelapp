<?php

namespace App\Repositories;


use App\Http\Model\Menu;
use App\Repositories\BaseRepository;

class MenuRepository extends BaseRepository
{

/*
    protected $menu;


    public function __construct(Menu $menu)
    {
        $this->model = $menu;

    }*/

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return Menu::class;
	}

	/**
	 * Boot up the repository, pushing criteria
	 */
	public function boot()
	{

	}




}
