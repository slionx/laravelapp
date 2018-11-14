<?php
/**
 * Created by PhpStorm.
 * User: Slionx
 * Date: 2017/11/29
 * Time: 10:01
 */

namespace App\Repositories;


use Prettus\Repository\Eloquent\BaseRepository;

class PostRepository extends BaseRepository {

	function model() {
		return "App\\Http\\Model\\Post";
	}

}