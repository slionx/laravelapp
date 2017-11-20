<?php

namespace App\Http\Controllers;

use App\Http\Model;
use App\Http\Model\User;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller{

	public function AllUser(){
		//all()
//        $user = User::all();
		//find()
//        $user = User::find(1);
		//findOrFail();
//        $user  = User::findOrFail(1);
//        $user  = User::get();
//        $user = User::where('id','>','1')
//            ->orderBy('id','desc')
//            ->first();
//        User::chunk(2,function($user){
//            var_dump($user);
//        });


		$bool = User::all();
		dd($bool);

	}

	/**
	 * Update the avatar for the user.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function update(Request $request)
	{


		$validator = Validator::make($request->all(), [
			'avatar' => 'required|image|mimes:jpeg,jpg,png|max:' . 2048,
		]);
		if ($validator->fails()) {
			return back()
				->withErrors($validator)
				->withInput();
		}


		/*$file = $request->avatar;
		var_dump($file);

		var_dump($request->file('avatar'));exit;*/
		//判断文件在请求中是否存在
		if ($request->hasFile('avatar')) {
			//判断文件在上传过程中是否出错
			if ($request->file('avatar')->isValid()){
				$path = $request->avatar->store('images');
				var_dump($path);

			}
		}






		//$path = $request->file('avatar')->store('avatars');
		//Storage::put('avatars/1', $fileContents);
		//$path = Storage::putFile('avatars', $request->file('avatar'));

		//var_dump($path);

	}


	public function uploadAvatar(Request $request)
	{
		$user = auth()->user();

		$milliseconds = getMilliseconds();

		$key = 'user/' . $user->name . "/avatar/$milliseconds." . $request->file('image')->guessClientExtension();

		if ($url = $this->uploadImage($user, $request, $key)) {
			$user->avatar = $url;
		}
		if ($user->save()) {
			$this->userRepository->clearCache();
			return back()->with('success', '修改成功');
		}
		return back()->with('success', '修改失败');
	}

	private function uploadImage(User $user, Request $request, $key, $max = 1024, $fileName = 'image')
	{
		$this->checkPolicy('manager', $user);
		$this->validate($request, [
			$fileName => 'required|image|mimes:jpeg,jpg,png|max:' . $max,
		]);
		$image = $request->file($fileName);
		return $this->imageRepository->uploadImage($image, $key);
	}

	public function verify($token){
		$user = User::where('confirmation_token',$token)->first();
		if(is_null($user)){
			return redirect('/');

		}else{
			$user->is_active = 1;
			$user->confirmation_token = str_random(40);
			$user->save();
			Auth::login($user);
			return redirect('/home');

		}

	}

}
