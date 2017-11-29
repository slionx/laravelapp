<?php
/**
 * Created by PhpStorm.
 * User: Slionx
 * Date: 2017/11/29
 * Time: 10:01
 */

namespace App\Repositories;

use App\Http\Model\Posts;


class PostRepository {

	protected $model;

	public function __construct(Posts $posts) {
		$this->model = $posts;
	}

}