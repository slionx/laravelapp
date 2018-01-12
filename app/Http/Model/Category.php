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

	protected $fillable = ['name','sort'];

    //protected $guarded = 'updated_at';
}
