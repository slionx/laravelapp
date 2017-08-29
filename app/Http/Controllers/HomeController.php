<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
//use Illuminate\Contracts\Validation\Validator;

use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    function changePassword(){

        if (Auth::id()) {
            $id = Auth::id();
            $user =  User::find(Auth::id());
            //$user = json_decode( json_encode( $user),true);


            $rules = array(
                'password' => 'required_with:old_password|min:6|confirmed',
                'old_password' => 'min:6',
            );
/*            if (!(Input::get('nickname') == $user->nickname))
            {
                $rules['nickname'] = 'required|min:4||unique:users,nickname';
            }*/
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->passes())
            {
                if (!(Input::get('old_password') == '')) {
                    if (!Hash::check(Input::get('old_password'), $user->password)) {
                        echo 'error';
                        //return Redirect::back()->with('message', array('type' => 'danger', 'content' => 'Old password error'));
                    } else {
                        $user->password = Hash::make(Input::get('password'));
                    }
                }
                /*$user->nickname = Input::get('nickname');*/
                $result = User::updatepassword($id,$user->password);
                if($result){
                    echo 'success';
                }else{
                    echo 'error';
                }
                return Redirect::to('home')->with('user', $user)->with('message', array('type' => 'success', 'content' => 'Modify successfully'));
            } else {
                return Redirect::back()->withInput()->with('user', $user)->withErrors($validator);
            }
        } else {
            return Redirect::to('/');
        }

    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = 'Slionx';
        $age =22;
        $data = [
            'name'=>'Slionx',
            'age'=>'22',
            'art'=>[
                'e1'=>1,
                'e2'=>2,
                'e3'=>3,
                'e4'=>4,
            ],
            'news'=>[],
        ];
        $a ='<script>alert(1)</script>';

        //config('database.connections.mysql.collation');
        //$pdo = DB::connection()->getPdo();
        //dd($pdo);
        //return view('home',compact('data','a'));
        //$user = DB::table('users')->get();//取全部数据
        //dd($user);

       // $dd = User::where('id','>',1)->get();
        //dd($dd);
    }


    function  login(){
        //session(['admin'=>null]);
        return view('auth.login');

    }
}
