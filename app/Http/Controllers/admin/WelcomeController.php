<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Builder;
use Yajra\Datatables\Datatables;

class WelcomeController extends Controller
{
	public function index(Builder $builder){
		if ( request()->ajax() ) {
			return $this->ajaxData();
		}
		$html = $builder->parameters( [
			'searchDelay' => 350,
			'language'    => [
				'url' => url( 'zh.json' )
			],
		] )->columns( [
			[ 'data' => 'id', 'name' => 'id', 'title' => trans( 'common.number' ) ],
			[ 'data' => 'type', 'name' => 'type', 'title' => '类型' ],
			[ 'data' => 'path', 'name' => 'path', 'title' => '路径' ],
			/*[ 'data' => 'sort', 'name' => 'sort', 'title' => '排序' ],*/
			[ 'data' => 'created_at', 'name' => 'created_at', 'title' => trans( 'menu.created_at' ) ],
			[ 'data' => 'updated_at', 'name' => 'updated_at', 'title' => trans( 'menu.updated_at' ) ],
		] )->addAction( [ 'data' => 'action', 'name' => 'action', 'title' => trans( 'common.action' ) ] );;

        return view('admin.welcome.index',compact('html'));
    }
	public function ajaxData() {
		$welcome_model = new \App\Http\Model\Welcome();

		return DataTables::of( $welcome_model->get() )
			->addColumn( 'action', function ( $welcome ) {
				return getActionButtonAttribute( $welcome->id, 'welcome' );
			} )
			->toJson();
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

		$parse = parse_url($welcome->path);

		if(!file_exists('.'.$parse['path'])){
			return redirect()->route('welcome.create')->with('error', '文件不存在');
		}
		if($welcome->save()){
			return redirect()->route( 'welcome.index' )->with( 'success', '幻灯创建成功' );
		}else {
			return redirect()->route('welcome.index')->with('error', '幻灯创建失败');
		}
		
	}

	public function show(  ) {
		
	}

	public function edit($id)
	{
		$model = new \App\Http\Model\Welcome();
		$welcome = $model->findOrFail($id);


		return view('admin.welcome.edit',compact('welcome'));


	}

	public function update(Request $request,$id)
	{
		$model = new \App\Http\Model\Welcome();
		$welcome = $model->findOrFail($id);
		$welcome->type = $request->type;
		$welcome->path = $request->path;

		$parse = parse_url($welcome->path);

		if(!file_exists('.'.$parse['path'])){
			return redirect()->route('welcome.edit')->with('error', '文件不存在');
		}
		if($welcome->save()){
			return redirect()->route( 'welcome.index' )->with( 'success', '幻灯修改成功' );
		}else {
			return redirect()->route('welcome.index')->with('error', '幻灯修改失败');
		}

	}

	public function destroy($id)
	{
		try {

			$welcome = new \App\Http\Model\Welcome();
			$result = $welcome->findOrFail($id);
			if($result->delete()){
				return redirect()->route('welcome.index')->with('success', '删除成功！');
			}else{
				return redirect()->back()->with('error','删除失败！');
			}

		} catch ( Exception $e ) {
			return redirect()->back()->with('error','删除失败！'. $e->getMessage());
		}

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
			$path = $request->server('HTTP_ORIGIN').trim($path.$filename,'.');
			if($result){
				return redirect()->route( 'welcome.create' )->with( 'success', '文件上传成功:'.$path );
			}else{
				return redirect()->route( 'welcome.create' )->with( 'error',  '文件上传失败' );
			}
		}else{
			return redirect()->route( 'welcome.create' )->with( 'error',  '不是正确的文件' );
		}
	}
}
