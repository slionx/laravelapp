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
        //echo $request->getClientIp();
        return view('welcome');
    }

    public function demo()
    {
        //echo $request->getClientIp();
        return view('demo');
    }

    public function welcome(){

	    $home_bg_images = \Storage::allFiles('slide');

	    return view('welcome',compact('home_bg_images'));
    }


}
