<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Adapter\Local;
use Validator;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function welcome(){

	    $home_bg_images = Storage::allFiles('images');

	    return view('welcome',compact('home_bg_images'));
    }

    public function create(){
	    return view('image');
    }

	public function uploadImages(Request $request){
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
					$path = $request->image->store( 'images', 'public' );
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
}
