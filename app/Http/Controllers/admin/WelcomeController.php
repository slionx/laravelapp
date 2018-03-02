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
		return view('admin.welcome.image');
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
	 *上传幻灯图片
	 * @return $this
	 */
	public function uploadSlideImages(Request $request){

		$validator = Validator::make( $request->all(), [
			'image' => 'required|image|mimes:jpeg,jpg,png|max:' . 800048,
		] );
		if ( $validator->fails() ) {
			return back()
				->withErrors( $validator )
				->withInput();
		}
		try {
			if ( $request->hasFile( 'image' ) ) {
				if ( $request->file( 'image' )->isValid() ) {
					$path = $request->image->store( 'slide', 'public' );
					if ( $path ) {
						echo '添加成功' . $path;
						//return back()->with( 'success', '添加成功' );
					}
				}
			}
		} catch ( Exception $e ) {
			echo $e->getMessage();
		}
	}

	public function uploadVideo(  ) {
		
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
