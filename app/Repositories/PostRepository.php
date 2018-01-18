<?php
/**
 * Created by PhpStorm.
 * User: Slionx
 * Date: 2017/11/29
 * Time: 10:01
 */

namespace App\Repositories;

use App\Http\Model\Posts;
use Illuminate\Http\Request;
use App\Http\Model\tag;



class PostRepository extends Repository {

	function model() {
		return Posts::class;
	}

	public function create(  $request ) {
		$ids = [];
		$tags = $request['tags'];
		if (!empty($tags)) {
			foreach ($tags as $tagName) {
				$tag = tag::firstOrCreate(['name' => $tagName]);
				array_push($ids, $tag->id);
			}
		}

		Posts::tags()->sync($ids);

		Posts::save($request->all());


	}

}