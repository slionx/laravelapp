<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = ['title', 'content'];
    /**
     * 应该被调整为日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public function tags()
    {
        return $this->belongsToMany('Tag');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
