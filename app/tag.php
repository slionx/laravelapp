<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use SoftDeletingTrait;

    protected $fillable = ['name'];

    public function articles()
    {

        return $this->belongsToMany('Article');
    }
}
