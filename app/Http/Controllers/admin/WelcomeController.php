<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
	public function index(){
        return view('admin.welcome.index');
    }

	public function create(){
		return view('admin.welcome.create');
	}

	public function store( Request $request  ) {
		//echo $request->type;
		Cache::forever('welcomeType', $request->type);
		Cache::forever('videoAddress', $request->videoAddress);
		echo Cache::get('videoAddress');
		
	}

	public function show(  ) {
		
	}

	/**
	 * @param Request $request
	 *上传
	 * @return $this
	 */
	public function upload(Request $request){


		$this->validate($request, [
			'file'=>'required|mimetypes:video/mp4,image/jpeg,image/jpg,image/png',
		],[
			'file.required'=>'上传文件必须选择',
			'file.mimetypes'=>'上传文件类型必须是视频或图片',
		]);

		if($request->hasFile('file')){
			$path = './uploads/welcome/';
			$suffix = $request->file('file')->guessClientExtension();
			$filename = time().'.'.$suffix;
			$result = $request->file('file')->move($path,$filename);


			if($result){
				return redirect()->route( 'welcome.create' )->with( 'success', '文件上传成功:'.$path.$filename );
			}else{
				return redirect()->route( 'welcome.create' )->with( 'error',  '文件上传失败' );
			}


		}





	}

	public function uploadVideo(  ) {
		
	}



}
