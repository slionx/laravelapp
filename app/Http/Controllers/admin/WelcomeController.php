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

		$this->validate($request, [
			'type'=>'required',
			'path'=>'required',
		],[
			'type.required'=>'欢迎页类型为必填项',
			'path.required'=>'欢迎页路径为必填项',
		]);


		$welcome = new \App\Http\Model\Welcome();
		$welcome->type = $request->type;
		$welcome->path = $request->path;
		if($welcome->save()){
			return redirect()->route( 'welcome.index' )->with( 'success', '幻灯创建成功' );
		}else {
			return redirect()->route('welcome.index')->with('error', '幻灯创建成功');
		}
		
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
			$path = trim($path.$filename,'.');
			if($result){
				return redirect()->route( 'welcome.create' )->with( 'success', '文件上传成功:'.$path );
			}else{
				return redirect()->route( 'welcome.create' )->with( 'error',  '文件上传失败' );
			}
		}else{
			return redirect()->route( 'welcome.create' )->with( 'error',  '不是正确的文件' );
		}
	}

	public function uploadVideo(  ) {
		
	}



}
