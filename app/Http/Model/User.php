<?php

namespace App\Http\Model;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Eloquent implements AuthenticatableContract,CanResetPasswordContract

{
	use Notifiable;
	use AuthenticableTrait;
	use CanResetPassword;

	protected $table = 'users';
	protected $primaryKey = 'id';

	//指定必须赋值的字段
	protected $fillable = ['name','email','password','avatar','is_active','confirmation_token'];
	//指定不允许批量赋值的字段
	//protected $guarded = [];

	// protected $dateFormat = 'U';
	//
	//自动维护时间戳
	//public $timestamps  =  true;



	/*    protected function getDateFormat(){
			return time();
		}
		protected function asDateTime($val){
			return $val;
		}*/
	public function sendPasswordResetNotification($token){
		$flag = Mail::send('email.resetpassword',['token'=>$token],function($message){
			$message->to($this->email)->subject('Slionx 博客帐户密码重置');
		});
	}

	public function roles() {
		return $this->belongsToMany(Role::class);
	}

	public function hasRole($role) {
		if(is_string($role)){
			return $this->roles->contains('name',$role);
		}
		return !! $role->intersect($this->role)->count();

	}

}


