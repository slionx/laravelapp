<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //use SoftDeletingTrait;

    protected $table = 'tags';
    protected $fillable = ['name','count'];

    public function Posts()
    {
        return $this->belongsToMany(Posts::class,'post_tag','tag_id','post_id');
    }

	public function getPosts(){
		return $this->Posts()->get();
	}

	public function deletePosts( $tag ) {
		return $this->Posts()->detach($tag);
	}

	public function getTagSum() {
		return $this->Posts()->count('id');

	}


}
