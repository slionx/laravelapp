<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{

    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * Get record by the name.
     * 
     * @param  string $name
     * @return collection
     */
    public function getByName($name)
    {
        return $this->model->where('name', $name)->first();
    }

    /**
     * Get the page of articles without draft scope.
     *
     * @param  integer $number
     * @param  string  $sort
     * @param  string  $sortColumn
     * @return collection
     */
    public function get( $sort = 'desc', $sortColumn = 'created_at')
    {
        return $this->model->orderBy($sortColumn, $sort)->get();
    }
}
