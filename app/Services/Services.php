<?php
/**
 * Created by PhpStorm.
 * User: Slionx
 * Date: 2017/12/2
 * Time: 11:05
 */

namespace app\Services;

use App\Contracts\CategoryContracts;

class CategoryServices implements CategoryContract{

	public function callme( $controller ) {

		dd('Call Me From CategoryServiceProvider In '.$controller);

	}

}