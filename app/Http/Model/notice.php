<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Http\Model\notice
 *
 * @mixin \Eloquent
 */
class notice extends Model
{
    protected $fillable = ['title','content'];
}
