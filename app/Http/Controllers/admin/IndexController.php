<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    function index(){

        return view('welcome');

    }
    function  login(){
        session(['admin'=>null]);
        return view('auth.login');

    }

    function changePassword($id){
        if (Auth::user()->is_admin or (Auth::id() == $id)) {
            $user =  User::find($id);
            $rules = array(
                'password' => 'required_with:old_password|min:6|confirmed',
                'old_password' => 'min:6',
            );


            if (!(Input::get('nickname') == $user->nickname))
            {
                $rules['nickname'] = 'required|min:4||unique:users,nickname';
            }
            echo 111;exit;
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->passes())
            {
                if (!(Input::get('old_password') == '')) {
                    if (!Hash::check(Input::get('old_password'), $user->password)) {
                        return Redirect::route('user.edit', $id)->with('user', $user)->with('message', array('type' => 'danger', 'content' => 'Old password error'));
                    } else {
                        $user->password = Hash::make(Input::get('password'));
                    }
                }
                $user->nickname = Input::get('nickname');
                $user->save();
                return Redirect::route('user.edit', $id)->with('user', $user)->with('message', array('type' => 'success', 'content' => 'Modify successfully'));
            } else {
                return Redirect::route('user.edit', $id)->withInput()->with('user', $user)->withErrors($validator);
            }
        } else {
            return Redirect::to('/');
        }

    }
}
