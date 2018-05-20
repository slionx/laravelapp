<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = [ 'user_id', 'post_id','pid','content','path' ];

    public function post(){
        return $this->belongsTo(posts::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
