<?php

namespace App\Repositories;

use App\Http\Model\Tag;

class TagRepository extends Repository
{
	function model() {
		return Tag::class;
	}
}
