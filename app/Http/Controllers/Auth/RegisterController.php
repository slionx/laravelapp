<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Model\User;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Validator;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {


	    try {
		    $user = User::create( [
			    'name'               => $data['name'],
			    'email'              => $data['email'],
			    'avatar'             => 'images/default.png',
			    'confirmation_token' => str_random( 40 ),
			    'password'           => bcrypt( $data['password'] ),
		    ] );
		    $this->sendVerifyEmailToUser( $user );
		    DB::commit();
		    return $user;
	    } catch ( Exception $e ) {
		    DB::rollback();
		    echo $e->getMessage();
		    echo $e->getCode();

	    }

    }

	private function sendVerifyEmailToUser($user) {
		$name = $user['name'];
		//$url = route('email.verify',['token'=>$user['confirmation_token'],'name'=>$name]);
		//$email = $user['email'];

		$flag = Mail::send('email.send',['name'=>$name,'token'=>$user['confirmation_token']],function($message,$user){
			$to = $user['email'];
			$message->to($to)->subject('请确认你在Slionx博客的注册邮箱');

			//$attachment = storage_path('app/files/test.doc');
			//在邮件中上传附件
			//$message->attach($attachment,['as'=>"=?UTF-8?B?".base64_encode('测试文档')."?=.doc"]);

		});
		if(count(Mail::failures()) > 0){

		}else{

		}
		return $flag;

	}
}