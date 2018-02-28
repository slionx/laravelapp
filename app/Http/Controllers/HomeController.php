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

	    $home_bg_images = Storage::allFiles('slide');

	    return view('welcome',compact('home_bg_images'));
    }


}
