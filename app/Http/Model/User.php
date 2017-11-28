<?php

namespace App\Http\Model;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Eloquent implements Authenticatable
{
	use Notifiable;
	use AuthenticableTrait;

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
		//url(config('app.url').route('password.reset', $this->token, false))
		$flag = Mail::send('email.resetpassword',['name'=>1,'token'=>$token],function($message){
			$message->to($this->email)->subject('请确认你在找回密码');

			//$attachment = storage_path('app/files/test.doc');
			//在邮件中上传附件
			//$message->attach($attachment,['as'=>"=?UTF-8?B?".base64_encode('测试文档')."?=.doc"]);

		});
	}
}


