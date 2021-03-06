<?php

namespace App\Http\Model;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\InvoicePaid;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Eloquent implements AuthenticatableContract,CanResetPasswordContract

{
	use Notifiable;
    use Authorizable;
	use AuthenticableTrait;
	use CanResetPassword;

	protected $table = 'users';
	protected $primaryKey = 'id';

	//指定可以批量赋值的字段(白名单)
	protected $fillable = ['name','email','password','avatar','is_active','confirmation_token'];

	//指定不允许批量赋值的字段(黑名单)
	//protected $guarded = [];

	protected $hidden = [
		'password', 'remember_token','confirmation_token',
	];

	// protected $dateFormat = 'U';
	//
	//自动维护时间戳 created_at 和 updated_at 字段
	//public $timestamps  =  true;

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

	/*public function sendPasswordResetNotification($token){
		$flag = Mail::send('email.resetpassword',['token'=>$token],function($message){
			$message->to($this->email)->subject('Slionx 博客帐户密码重置');
		});
	}*/

	public function posts() {
		return $this->hasMany(Post::class,'post_author');
	}

	public function roles() {
		//return $this->belongsToMany(Role::class,'role_user','user_id','role_id')->withPivot(['user_id','role_id']);
		return $this->belongsToMany(Role::class);
	}

	//判断用户是否有某个角色
	public function hasRole($role) {
		if(is_string($role)){
			return $this->roles->contains('name',$role); //contains 方法判断集合是否包含一个给定项
		}
		return !! $role->intersect($this->roles)->count(); //intersect 方法返回两个集合的交集
	}

    public function isAdmin()
    {
        return $this->hasRole('admin');
	}

	//给用户分配角色
	public function assignRole( $role ) {
		return $this->roles()->save($role);
	}

	//取消用户分配角色
	public function deleteRole( $role ) {
		return $this->roles()->detach($role);
	}

	//用户是否有权限
	public function hasPermission( $permission ) {
		return $this->hasRole($permission->roles);
	}

	public function syncRoles( $id ) {
		return $this->roles()->sync($id);
	}

	public function getRole() {
		return $this->roles->all();
	}
	public function getOwnRole() {
		return $this->roles->first();
	}

    public function send_notify()
    {
        $user = \Auth::user();
        //$user->notify(new InvoicePaid($invoice));
	}

    public function isSuperAdmin()
    {
        // 定义ID为1为超级管理员
        if ($this->id == 1) {
            return true;
        }
        return false;
    }



}


