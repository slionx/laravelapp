<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = ['post_title', 'post_author','post_category','post_content','post_slug','post_author','post_password','post_image','post_status','post_sort','comments_status','comments_count','followers_count'];
    /**
     * 应该被调整为日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 * 定义关联关系允许通过文章访问所属分类
	 */
	public function category(){
    	return $this->belongsTo(Category::class);
    }

	public function user()
	{
		return $this->belongsTo(User::class);
	}


	public function tag()
	{
		return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id')->withPivot(['post_id','tag_id']);
	}

	public function attachTag( $tag ) {
		return $this->tag()->attach($tag);
	}

	public function getTag(){
		return $this->tag()->get();
	}

	public function syncTag( $tag ) {
		return $this->tag()->sync($tag);
	}

}
