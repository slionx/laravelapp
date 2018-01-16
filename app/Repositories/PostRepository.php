<?php
/**
 * Created by PhpStorm.
 * User: Slionx
 * Date: 2017/11/29
 * Time: 10:01
 */

namespace App\Repositories;

use App\Http\Model\Posts;


class PostRepository extends Repository {

	function model() {
		return Posts::class;
	}

}