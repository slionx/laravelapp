<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\AdminLog;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Repositories\RoleRepository as Role;
use App\Repositories\UserRepository as User;
use DB;


class UserController extends Controller {

	protected $module = 'user';

	public function __construct( User $user ,Role $role  ) {
		$this->user = $user;
		$this->role = $role;
	}

	public function test(){

        DB::beginTransaction();

        $user = new \App\Http\Model\User();
        $user->name = rand(1,99);
        $user->email = rand(1,99).'@qq.com';
        $user->password = Hash::make('123456');
        $user->avatar = '';


        if(!$user->save()){
            DB::rollBack();
            return response()->json('error');
        }

        $log = AdminLog::create(\Auth::id(),AdminLog::TYPE_USER,"tianjia用户");
        if ($log['status'] !== 1) {
            DB::rollBack();
            return response()->json($log);
        }
        DB::commit();
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

		return view( 'Backend.user.index', compact( 'html' ) );
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
			$user_data[$k]['avatar'] = "<img src='".config('app.APP_URL').$user_data[$k]['avatar']."' width='50'>";
		}

		return DataTables::of( $user_data )->escapeColumns([])
		                 ->addColumn( 'action', function ( $user ) {
			                 return getActionButtonAttribute( $user->id,$this->module);
		                 } )
		                 ->toJson();
	}

	public function create() {
        $roles = $this->role->all();
        $current_role = [];
		return view( 'Backend.user.create' ,compact('roles','current_role'));
	}

	public function store(Request $request)
	{

		$this->validate($request, [
			'name'=>'required|alpha_dash|between:4,20',
			'email'=>'required|email',
			'password'=>'confirmed:repassword|between:6,30'
		],[
			'name.required'=>'用户名不能省略',
			'email.required'=>'邮箱不能省略',
			'email.email'=>'邮箱格式不正确',
			'password.same'=>'两次密码不一致',
		]);
        if($request->hasFile('avatar')){
            if ($request->file('avatar')->isValid()){
                $request->avatar = "/uploads/".$request->avatar->store('avatar/'.date('Ymd'));
            }
        }

		$user = new \App\Http\Model\User();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = \Hash::make($request->password);
		$user->avatar = $request->avatar;

		if($user->save()){
			return redirect()->route( 'user.index' )->with( 'success', '用户' . $request['name'] . '创建成功' );
		}else {
			return redirect()->back()->with('error', '用户' . $request['name'] . '创建失败');
		}

	}

	public function edit( $id ) {
		$user = $this->user->find($id);
		$user_role = $user->getRole();
		if($user_role){
			foreach ($user_role as $role){
				$current_role[] = $role->id;
			}
		}else{
            $current_role = [];
		}
		$roles = $this->role->all();
		return view( 'Backend.user.edit' ,compact('user','roles','current_role','id'));
	}

    public function destroy($id)
    {
        try {
            $ifHasRole = $this->user->find($id)->roles();
            if($ifHasRole){
                return redirect()->back()->with('error','请先取消用户相关角色！');
            }
            $result = $this->user->delete($id);
            if($result){
                return redirect()->route('user.index')->with('success', '删除成功！');
            }else{
                return redirect()->back()->with('error','删除失败！');
            }
        } catch ( Exception $e ) {
            return redirect()->back()->with('error','删除失败！'. $e->getMessage());
        }
        
	}


	public function update( Request $request ,$id) {
		$user = $this->user->find($id);

        if($request->has('name')){
            $this->validate($request, ['name'=>'alpha_dash|between:4,20']);
            $data['name'] = $request->name;
        }
        if($request->has('email')){
            $this->validate($request, ['email'=>'email']);
            $data['email'] = $request->email;
        }
        if($request->hasFile('avatar')){
            $this->validate($request, [
                'avatar'=>'mimetypes:image/jpeg,image/jpg,image/png',
            ],[
                'avatar.mimetypes'=>'上传文件类型必须是图片',
            ]);
            if ($request->file('avatar')->isValid()){
                $data['avatar'] = "/uploads/".$request->avatar->store('avatar/'.date('Ymd'));
            }
        }
        if($request->has('password')){
            $this->validate($request, ['password'=>'confirmed:password_confirmation|between:6,30']);
            $data['password'] = \Hash::make($request->password);
        }
        $bool = $this->user->update($data,$id);
		$user->syncRoles($request->role);
        if($bool){
            return redirect('admin/'.$this->module)->with( 'success', '更新成功' );
        }else{
            return redirect()->back()->with('error','更新失败！');
        }
	}


	public function verify( $token ) {
		$user = User::where( 'confirmation_token', $token )->first();
		if ( is_null( $user ) ) {
			return redirect( '/post/list' );
		} else {
			$user->is_active          = 1;
			$user->confirmation_token = str_random( 40 );
			$user->save();
			\Auth::login( $user );
			return redirect( '/post/list' );
		}
	}

}
