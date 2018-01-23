<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //use SoftDeletingTrait;

    protected $table = 'tags';
    protected $fillable = ['name'];

    public function Posts()
    {
        return $this->belongsToMany('posts');
    }


}
