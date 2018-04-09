<?php

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
	protected $table = 'roles';

	protected $fillable = ['name','slug'];

	public function user()
	{
		return $this->belongsToMany(User::class);
	}

	public function permissions()
	{
		//return $this->belongsToMany(Permission::class,'permission_role','role_id','permission_id')->withPivot(['permission_id','role_id']);
		return $this->belongsToMany(Permission::class);
	}

	//角色与用户是否有对应关系
	public function roleHasUser($id){
		return $this->user()->find($id);
	}

	public function getPermission() {
		return $this->permissions->all();
	}

	public function syncPermission( $permission ) {
		return $this->permissions()->sync($permission);
	}

	//取消角色分配权限
	public function deletePermission($permission) {
		return $this->permissions()->detach($permission);
	}

	public function attachPermission( $permissions ) {
		return $this->permissions()->attach($permissions);
	}

	//给角色分配权限
	public function givePermission($permission) {
		return $this->permissions()->save($permission);
	}

	//---------------以上为用到的方法

	//判断角色是否有权限
	public function hasPermission(Permission $permission ) {
		return $this->permissions->contains($permission);
	}


}
