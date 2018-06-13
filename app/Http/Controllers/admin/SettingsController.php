<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class SettingsController extends Controller
{
    public function UpdateSet(Request $request)
    {
        if($request->ajax()){
            cache()->forget('backend_global_set_'.$request->name);
            cache()->forever('backend_global_set_'.$request->name,$request->status);
            $result = cache()->get('backend_global_set_'.$request->name);
            if($result){
                $json_arr = ['status'=>true,'result'=>$result];
            }else{
                $json_arr = ['status'=>false,'result'=>$result];
            }
            return response()->json($json_arr, 200);
        }
    }

}
