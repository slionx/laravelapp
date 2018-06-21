<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadImagesController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'file'=>'mimetypes:image/jpeg,image/jpg,image/png,image/gif',
        ],[
            'file.mimetypes'=>'上传文件类型必须是图片',
        ]);

        if($request->hasFile('file')){
            if ($request->file('file')->isValid()){
                $result = "/uploads/".$request->file->store('images/'.date('Ymd'));
                $path = $request->server('HTTP_ORIGIN').$result;
            }
            if($result){
                return redirect()->route( 'welcome.create' )->with( 'success', '文件上传成功:  '.$path );
            }else{
                return redirect()->back()->withInput($request->all())->with( 'error',  '文件上传失败' );
            }
        }else{
            return redirect()->back()->withInput($request->all())->with( 'error',  '不是正确的文件' );
        }
    }
}
