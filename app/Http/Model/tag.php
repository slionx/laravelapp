<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    //use SoftDeletingTrait;

    protected $table = 'tags';
    protected $fillable = ['name'];

    public function articles()
    {

        return $this->belongsToMany('Article');
    }
}
