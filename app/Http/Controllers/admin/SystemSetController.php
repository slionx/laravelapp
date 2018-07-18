<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\SystemSetRepository;



class SystemSetController extends Controller
{
    protected $systemSetRepository;

    public function __construct( SystemSetRepository $systemSetRepository) {
        $this->systemSetRepository = $systemSetRepository;
    }

    public function UpdateSet(Request $request)
    {
        if($request->ajax()){
            //global_comment_status
            $bool = $this->systemSetRepository->saveSetting($request->name,$request->status);
            $json_arr = ['status'=>$bool,'result'=>$request->status];
            return response()->json($json_arr, 200);
        }
    }

}
