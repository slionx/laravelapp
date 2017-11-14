<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Http\Model\Menu;

class MenuRepository extends BaseRepository
{


    protected $menu;


    public function __construct(Menu $menu)
    {
        $this->model = $menu;

    }

    public function all(){
    	return $this->model->toArray();
    }


}
