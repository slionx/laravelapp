<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Repositories\RoleRepository as Role;
use App\Repositories\UserRepository as User;


class UserController extends Controller {

	protected $module = 'user';

	public function __construct( User $user ,Role $role  ) {
		$this->user = $user;
		$this->role = $role;
	}

	public function AllUser() {
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


		//$bool = User::all();
		//dd( $bool );

	}

	public function index( Builder $builder ) {

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
			[ 'data' => 'name', 'name' => 'name', 'title' => '用户名' ],
			[ 'data' => 'email', 'name' => 'email', 'title' => '邮箱' ],
			[ 'data' => 'is_active', 'name' => 'is_active', 'title' => '是否激活邮箱' ],
			[ 'data' => 'role', 'name' => 'role_slug', 'title' => '角色' ],
			[ 'data' => 'avatar', 'name' => 'avatar', 'title' => '头像' ],
			[ 'data' => 'created_at', 'name' => 'created_at', 'title' => trans( 'menu.created_at' ) ],
			[ 'data' => 'updated_at', 'name' => 'updated_at', 'title' => trans( 'menu.updated_at' ) ],
		] )->addAction( [ 'data' => 'action', 'name' => 'action', 'title' => trans( 'common.action' ) ] );;

		return view( 'admin.user.index', compact( 'html' ) );
	}

	private function ajaxData() {
		$tmp = $this->user->all();
		foreach ($tmp as $k => $v){
			//$v->getRole();
			$user_data[$k] = $v;
			$user_data[$k]['role'] = $v->roles[0]->slug;
			$user_data[$k]['is_active'] = $user_data[$k]['is_active'] ? '是' : '否';
		}
		return DataTables::of( $user_data )
		                 ->addColumn( 'action', function ( $user ) {
			                 return getActionButtonAttribute( $user->id,$this->module);
		                 } )
		                 ->toJson();
	}

	public function create() {
		return view( 'admin.user.create' );
	}

	public function edit( $id ) {
		$user = $this->user->find($id);
		$nowroles = $user->getRole();
		foreach ($nowroles as $role){
			$now_role[] = $role->id;
		}

			 //var_dump($nowroles);


		$roles = $this->role->all();
		return view( 'admin.user.edit' ,compact('user','roles','now_role','id'));
	}


	public function update( Request $request ,$id) {
		$user = $this->user->find($id);
		$user->syncRoles($request->role);



		/*
		$validator = Validator::make( $request->all(), [
			'avatar' => 'required|image|mimes:jpeg,jpg,png|max:' . 2048,
		] );
		if ( $validator->fails() ) {
			return back()
				->withErrors( $validator )
				->withInput();
		}

		$file = $request->avatar;
		var_dump($file);

		var_dump($request->file('avatar'));exit;
		//判断文件在请求中是否存在
		if ( $request->hasFile( 'avatar' ) ) {
			//判断文件在上传过程中是否出错
			if ( $request->file( 'avatar' )->isValid() ) {
				$path = $request->avatar->store( 'images' );
				var_dump( $path );

			}
		}
		*/
		//$path = $request->file('avatar')->store('avatars');
		//Storage::put('avatars/1', $fileContents);
		//$path = Storage::putFile('avatars', $request->file('avatar'));
		//var_dump($path);
	}


	public function uploadAvatar( Request $request ) {
		$user = auth()->user();

		$milliseconds = getMilliseconds();

		$key = 'user/' . $user->name . "/avatar/$milliseconds." . $request->file( 'image' )->guessClientExtension();

		if ( $url = $this->uploadImage( $user, $request, $key ) ) {
			$user->avatar = $url;
		}
		if ( $user->save() ) {
			$this->userRepository->clearCache();

			return back()->with( 'success', '修改成功' );
		}

		return back()->with( 'error', '修改失败' );
	}

	private function uploadImage( User $user, Request $request, $key, $max = 1024, $fileName = 'image' ) {
		$this->checkPolicy( 'manager', $user );
		$this->validate( $request, [
			$fileName => 'required|image|mimes:jpeg,jpg,png|max:' . $max,
		] );
		$image = $request->file( $fileName );

		return $this->imageRepository->uploadImage( $image, $key );
	}

	public function verify( $token ) {
		$user = User::where( 'confirmation_token', $token )->first();
		if ( is_null( $user ) ) {
			return redirect( '/' );
		} else {
			$user->is_active          = 1;
			$user->confirmation_token = str_random( 40 );
			$user->save();
			Auth::login( $user );
			return redirect( '/home' );
		}
	}

}
