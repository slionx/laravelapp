<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
	//use SoftDeletingTrait;

	protected $table = 'tags';
	protected $fillable = [ 'name', 'count' ];

	public function Posts() {
		return $this->belongsToMany( Posts::class, 'post_tag', 'tag_id', 'post_id' );
	}

	public function getPosts() {
		return $this->Posts()->with( [
			'category' => function ( $query ) {
				$query->select( 'id', 'name' );
			}
		] )->with( [
			'tag' => function ( $query ) {
				$query->select( 'id', 'name' );
			}
		] )->with( [
			'user' => function ( $query ) {
				$query->select( 'id', 'name' );
			}
		] )->orderBy( 'created_at', 'desc' )->paginate( 4, [
			'id',
			'post_author',
			'post_title',
			'post_slug',
			'post_content',
			'post_category',
			'comments_count',
			'followers_count',
			'post_password',
			'created_at'
		] );
	}

	public function deletePosts( $tag ) {
		return $this->Posts()->detach( $tag );
	}

	public function getTagSum() {
		return $this->Posts()->count( 'id' );

	}


}
