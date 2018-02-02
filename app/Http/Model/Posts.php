<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = ['post_title', 'post_content'];
    /**
     * 应该被调整为日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


	public function tag()
	{
		return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id')->withPivot(['post_id','tag_id']);
	}

	public function attachTag( $tag ) {
		return $this->tag()->attach($tag);
	}

	public function syncTag( $tag ) {
		return $this->tag()->sync($tag);
	}

    public function user()
    {
        return $this->belongsTo('User');
    }
}
