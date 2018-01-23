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

abstract class Repository implements RepositoryInterface ,CriteriaInterface {

	private $app;

	protected $model;

	protected $criteria;

	protected $skipCriteria = false;

	public function __construct(App $app, Collection $collection) {
		$this->app = $app;
		$this->criteria = $collection;
		$this->resetScope();
		$this->makeModel();
	}


	/**
	 * Specify Model class name
	 *
	 * @return mixed
	 */
	public abstract function model();

	//function model();

	public function makeModel(  ) {
		$model = $this->app->make($this->model());

		if(!$model instanceof Model)
			throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

		return $this->model = $model;

	}


	public function all( $columns = array( '*' ) ) {
		$this->applyCriteria();
		return $this->model->get($columns);
	}

	public function paginate( $perPage = 10, $columns = array( '*' ) ) {
		$this->applyCriteria();
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
		$this->applyCriteria();
		return $this->model->find($id, $columns);
	}

	public function findBy( $attribute, $value, $columns = array( '*' ) ) {
		$this->applyCriteria();
		return $this->model->where($attribute, '=', $value)->first($columns);
	}

	/**
	 * @return $this
	 */
	public function resetScope() {
		$this->skipCriteria(false);
		return $this;
	}


	/**
	 * @param bool $status
	 * @return $this
	 */
	public function skipCriteria($status = true){
		$this->skipCriteria = $status;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCriteria() {
		return $this->criteria;
	}

	/**
	 * @param Criteria $criteria
	 * @return $this
	 */
	public function getByCriteria(Criteria $criteria) {
		$this->model = $criteria->apply($this->model, $this);
		return $this;
	}

	/**
	 * @param Criteria $criteria
	 * @return $this
	 */
	public function pushCriteria(Criteria $criteria) {
		$this->criteria->push($criteria);
		return $this;
	}

	/**
	 * @return $this
	 */
	public function applyCriteria() {
		if($this->skipCriteria === true)
			return $this;

		foreach($this->getCriteria() as $criteria) {
			if($criteria instanceof Criteria)
				$this->model = $criteria->apply($this->model, $this);
		}

		return $this;
	}


}