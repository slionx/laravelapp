<?php

namespace app\Repositories;


use App\Contracts\CategoryInterface;
use App\Http\Model\Category;


class CategoryRepository implements CategoryInterface
{

    /*protected $model;

    public function __construct( Category $category  )
    {
        $this->model = $category;
    }*/


	public function all() {
		return Category::all();
	}

	public function find( $id ) {
    	return Category::find($id);
	}

	public function save( $data ) {
		return Category::create($data);
	}

	/**
     * Get record by the name.
     * 
     * @param  string $name
     * @return collection
     */
    public function getByName($name)
    {
        //return $this->model->where('name', $name)->first();
    }

    /**
     * Get the page of articles without draft scope.
     *
     * @param  integer $number
     * @param  string  $sort
     * @param  string  $sortColumn
     * @return collection
     */
    /*public function get( $sort = 'desc', $sortColumn = 'created_at')
    {
        return $this->model->orderBy($sortColumn, $sort)->get();
    }*/
}
