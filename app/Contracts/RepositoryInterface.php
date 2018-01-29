<?php
/**
 * Created by PhpStorm.
 * User: Slionx
 * Date: 2018/1/16
 * Time: 11:43
 */

namespace app\Contracts;


interface RepositoryInterface
{
	public function all( $columns = array( '*' ) );

	public function paginate( $perPage = 10, $columns = array( '*' ) ) ;

	public function update( array $data, $id, $attribute = "id" );

	public function create(  array $attributes ) ;

	public function delete( $id ) ;

	public function find( $id, $columns = array( '*' ) ) ;

	public function findBy( $attribute, $value, $columns = array( '*' ) ) ;


}