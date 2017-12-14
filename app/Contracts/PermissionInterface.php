<?php
/**
 * Created by PhpStorm.
 * User: Slionx
 * Date: 2017/12/14
 * Time: 15:04
 */

namespace App\Contracts;


interface PermissionInterface {

	public function all();

	public function find($id);

	public function save($data);

}