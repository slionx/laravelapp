<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Http\Model\permission
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Model\permission[] permission
 * @mixin \Eloquent
 */
class permission extends Model
{
	protected $table = 'permissions';

	protected $fillable = ['name','display_name'];

	public function roles()
	{
		//return $this->belongsToMany(Role::class,'permission_role','permission_id','role_id')->withPivot(['permission_id','role_id']);
        return $this->belongsToMany(Role::class);
	}
}
