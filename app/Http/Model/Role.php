<?php

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
	protected $table = 'roles';

	protected $fillable = ['name','slug'];

	public function permissions()
	{
		return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id')->withPivot(['permission_id','role_id']);
	}

	//给角色分配权限
	public function givePermission($permission) {
		return $this->permissions()->save($permission);
	}

	//取消角色分配权限
	public function deletePermission(Permission $permission) {
		return $this->permissions()->detach($permission);
	}

	public function syncPermission( $permission ) {
		return $this->permissions()->sync($permission);
	}

	public function attachPermission( $permissions ) {
		return $this->permissions()->attach($permissions);
	}

	//判断角色是否有权限
	public function hasPermission(Permission $permission ) {
		return $this->permissions->contains($permission);
	}

	public function getPermission() {
		return $this->permissions->all();
	}
}
