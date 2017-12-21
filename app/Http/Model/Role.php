<?php

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'roles';

	protected $fillable = ['name','slug'];

	public function permissions()
	{
		return $this->belongsToMany(Permission::class);
	}

	public function givePermission(Permission $permission) {
		return $this->permissions()->save($permission);

	}
}
