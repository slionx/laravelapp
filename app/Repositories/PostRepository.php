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

    /**
     * Get the page of articles without draft scope.
     *
     * @param  integer $number
     * @param  string  $sort
     * @param  string  $sortColumn
     * @return collection
     */
    public function page($number = 5, $sort = 'desc', $sortColumn = 'created_at')
    {
        return $this->model->orderBy($sortColumn, $sort)->paginate($number);
    }

}