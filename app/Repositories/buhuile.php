<?php
/**
 * Created by PhpStorm.
 * User: Slionx
 * Date: 2018/1/23
 * Time: 16:56
 */

namespace app\Repositories;


use App\Contracts\RepositoryInterface;
use App\Contracts\CriteriaInterface;

class buhuile implements CriteriaInterface{

	public function applyCriteria($model , RepositoryInterface $repository  ) {
		$query = $model->where('length', '>', 120);
		return $query;

	}
}