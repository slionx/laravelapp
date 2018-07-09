<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadImagesController extends Controller
{
    public function __construct(Upload $upload)
    {
        $this->upload = $upload;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file'=>'mimetypes:image/jpeg,image/jpg,image/png,image/gif',
        ],[
            'file.mimetypes'=>'上传文件类型必须是图片',
        ]);

        if($request->hasFile('file')){
            if ($request->file('file')->isValid()){
                $path = $request->file->store('images/'.date('Ymd'));
                $full_path = $request->server('HTTP_ORIGIN')."/uploads/".$path;
                if($path){
                    $this->upload->path = $full_path;
                    $result = $this->upload->save();
                    return response()->json(['status'=>$result,'result'=>$full_path,'id'=>$this->upload->id], 200);
                }else{
                    return response()->json(['status'=>false,'result'=>'error'], 200);
                }
            }
        }else{
            return response()->json(['status'=>false,'result'=>'error file'], 200);
        }
    }

    public function destroy($id)
    {
        $result = $this->upload->findOrFail($id,['id','path']);
        if($result){
            $replace_str = config("app.url")."/";
            $path = str_replace($replace_str,'',$result->path);
            \File::delete($path);
            $result->delete($id);
            return response()->json(['status'=>true], 200);
        }
    }

    public function select(Request $request)
    {

        $perpage = $request->perpage ? $request->perpage : 9;
        $result = $this->upload->orderBy('created_at','desc')->paginate($perpage,['id', 'path', 'created_at'],'page',$request->page);
        return response()->json(['result'=>$result], 200);
    }
}
