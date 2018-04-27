<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
			$user_data[$k] = $v;
			$role = $v->roles()->get();
			if (count($role) > 1){
				$role_arr= '';
				foreach ( $role as $item ) {
					$role_arr .= $item->name;
				}
				$user_data[$k]['role'] = $role_arr;
			}elseif (count($role) == 1){
				$user_data[$k]['role'] = $role[0]->name;
			} else{
				$user_data[$k]['role'] = '';
			}
			$user_data[$k]['is_active'] = $user_data[$k]['is_active'] ? '是' : '否';
			$user_data[$k]['avatar'] = "<img src='..".$user_data[$k]['avatar']."' width='50'>";
		}
		return DataTables::of( $user_data )->escapeColumns([])
		                 ->addColumn( 'action', function ( $user ) {
			                 return getActionButtonAttribute( $user->id,$this->module);
		                 } )
		                 ->toJson();
	}

	public function create() {
		return view( 'admin.user.create' );
	}

	public function store(Request $request)
	{

		$this->validate($request, [
			'name'=>'required|regex:/\w{8,20}/',
			'email'=>'required|email',
			'password'=>'same:repassword'
		],[
			'name.required'=>'用户名不能省略',
			'name.regex'=>'用户规则不正确 请填写8至20位字母数字下划线',
			'email.required'=>'邮箱不能省略',
			'email.email'=>'邮箱格式不正确',
			'password.same'=>'两次密码不不一致',
		]);

		if($request->hasFile('avatar')){
			$path = './uploads/avatar/'.date('Ymd').'/';
			$suffix = $request->file('avatar')->guessClientExtension();
			$filename = time().rand(100000,999999).'.'.$suffix;
			$request->file('avatar')->move($path,$filename);

			$request->avatar = trim($path.$filename,'.');
		}

		$user = new \App\Http\Model\User();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->avatar = $request->avatar;

		if($user->save()){
			return redirect()->route( 'user.index' )->with( 'success', '用户' . $request['name'] . '创建成功' );
		}else {
			return redirect()->route('user.index')->with('success', '用户' . $request['name'] . '创建成功');
		}

	}

	public function edit( $id ) {
		$user = $this->user->find($id);
		$nowroles = $user->getRole();
		if($nowroles){
			foreach ($nowroles as $role){
				$now_role[] = $role->id;
			}
		}else{
			$now_role = [];
		}
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

		$path = ".upload/avatar/$milliseconds." . $request->file( 'image' )->guessClientExtension();

		if ( $url = $this->uploadImage( $user, $request, $path ) ) {
			$user->avatar = $url;
		}
		if ( $user->save() ) {
			$this->userRepository->clearCache();

			return back()->with( 'success', '修改成功' );
		}

		return back()->with( 'error', '修改失败' );
	}

	private function uploadImage( User $user, Request $request, $path, $max = 3072, $fileName = 'image' ) {
		$this->checkPolicy( 'manager', $user );
		$this->validate( $request, [
			$fileName => 'required|image|mimes:jpeg,jpg,png|max:' . $max,
		] );
		$image = $request->file( $fileName );

		return $this->imageRepository->uploadImage( $image, $path );
	}

	public function verify( $token ) {
		$user = User::where( 'confirmation_token', $token )->first();
		if ( is_null( $user ) ) {
			return redirect( '/post/list' );
		} else {
			$user->is_active          = 1;
			$user->confirmation_token = str_random( 40 );
			$user->save();
			Auth::login( $user );
			return redirect( '/post/list' );
		}
	}

}
