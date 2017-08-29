<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use SoftDeletingTrait;

    protected $fillable = ['title', 'content'];

    public function tags()
    {
        return $this->belongsToMany('Tag');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
