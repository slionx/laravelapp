<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Service\Admin\MenuServices;

class testController extends Controller
{
	protected $service;

	public function __construct(MenuServices $services){
		$this->service = $services;

	}

    public function index(){
        $all = $this->service->all();
        echo 11;
        var_dump($all);
    }

	public function test(){
		//$all = $this->service->all();
		echo 11;
		//var_dump($all);
	}

}
