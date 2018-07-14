<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\SystemSet;



class SettingsController extends Controller
{
    public function UpdateSet(Request $request)
    {
        if($request->ajax()){
            //global_comment_status
            $set = SystemSet::where('name','=',$request->name)->firstOrFail();
            $set->value = $request->status;
            $result = $set->save();
            if($result){
                $json_arr = ['status'=>true,'result'=>$result];
            }else{
                $json_arr = ['status'=>false,'result'=>$result];
            }
            return response()->json($json_arr, 200);
        }
    }

}
