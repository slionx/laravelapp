<?php

namespace App\Http\Controllers;

use App\Http\Model\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function __construct(
        CommentRepository $CommentRepository
    )
    {
        $this->CommentRepository = $CommentRepository;
    }

    public function store(Request $request)
    {

        if(!\Auth::check()){
            return redirect()->back()->with('error','请登录后评论');
        }

        $this->validate($request,[
            'comment' => 'required|min:5'
        ]);

        $user_id = auth()->user()->id;

        if($request->pid == 0){
            $path = 0;
            $pid = 0;
        }else{

            $result = $this->CommentRepository->find($request->pid,['id','path','pid']);
            //$pid = $result->pid;
            if($result->pid == 0){
                $pid =$result->id;
            }else{
                $pid = $result->pid;
            }
            $path = $result->path.",".$result->id;
        }
        $data = [
            'user_id'=>$user_id,
            'post_id'=>$request->post_id,
            'content'=>$request->comment,
            'pid'=>$pid,
            'path'=>$path,
        ];

        if($this->CommentRepository->create($data)){
            return redirect()->back()->with('success','success');
        }else{
            return redirect()->back()->with('error','error');
        }
    }

    public function destroy($id)
    {
        try {
            if ($this->CommentRepository->delete($id)) {
                return redirect()->back()->with('success','success');
            } else {
                return redirect()->back()->with('error','error');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', '删除失败！' . $e->getMessage());
        }
    }
}
