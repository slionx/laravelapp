<?php
/**
 * Created by PhpStorm.
 * User: Slionx
 * Date: 2018/1/23
 * Time: 16:40
 */

namespace app\Repositories;

use App\Contracts\RepositoryInterface as Repository;


abstract class Criteria {
	/**
	 * @param $model
	 * @param RepositoryInterface $repository
	 * @return mixed
	 */
	public abstract function apply($model, Repository $repository);

}