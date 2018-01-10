<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
	protected $table = 'permissions';

	protected $fillable = ['name','slug','description'];

	public function roles()
	{
		return $this->belongsToMany(Role::class,'permission_role','permission_id','role_id')->withPivot(['permission_id','role_id']);
	}
}