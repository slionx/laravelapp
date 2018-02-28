<?php
/**
 * Created by PhpStorm.
 * User: Slionx
 * Date: 2018/1/16
 * Time: 14:00
 */

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;


class MenuRepository extends BaseRepository {

	function model() {
		return "App\\Http\\Model\\Menu";
	}

}