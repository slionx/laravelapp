<?php
/**
 * Created by PhpStorm.
 * User: Slionx
 * Date: 2018/1/16
 * Time: 11:46
 */

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use App\Contracts\CriteriaInterface;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


abstract class Repository implements RepositoryInterface  {

	private $app;

	protected $model;

	public function __construct(App $app) {
		$this->app = $app;
//		$this->criteria = $collection;
//		$this->resetScope();
//		$this->makeModel();
	}


	/**
	 * Specify Model class name
	 *
	 * @return mixed
	 */
	public abstract function model();

	public function makeModel(  ) {
		$model = $this->app->make($this->model());
		if(!$model instanceof Model)
			throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
		return $this->model = $model;
	}

	public function all( $columns = array( '*' ) ) {
		return $this->model->get($columns);
	}

	public function paginate( $perPage = 10, $columns = array( '*' ) ) {
		return $this->model->paginate($perPage, $columns);
	}

	public function update( array $data, $id, $attribute = "id" ) {
		return $this->model->where($attribute, '=', $id)->update($data);
	}

	public function create(  array $attributes ) {
		return $this->model->create($attributes);
	}

	public function delete( $id ) {
		return $this->model->destroy($id);
	}

	public function find( $id, $columns = array( '*' ) ) {
		return $this->model->find($id, $columns);
	}

	public function findBy( $attribute, $value, $columns = array( '*' ) ) {
		return $this->model->where($attribute, '=', $value)->first($columns);
	}

}