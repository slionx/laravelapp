<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
	protected $table = 'posts';

	protected $fillable = ['name','slug','description'];

	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}
}
