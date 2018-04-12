<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Http\Model\Category
 *
 * @mixin \Eloquent
 */
class Category extends Model
{
    protected $table = 'category';

	protected $fillable = ['name','sort','count'];

    //protected $guarded = 'updated_at';


	public function posts() {
		return $this->hasMany(Posts::class,'post_category');
	}
}
