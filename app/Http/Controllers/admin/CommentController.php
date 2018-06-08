<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Comment;
use App\Http\Controllers\Controller;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;


class CommentController extends Controller
{
    public function __construct(
        CommentRepository $CommentRepository
    )
    {
        $this->CommentRepository = $CommentRepository;
    }

    protected $module = 'comment';

    /**
     * Display index page.
     *
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index( Builder $builder ) {
        if ( request()->ajax() ) {
            return $this->ajaxData();
        }
        $html = $builder->parameters( [
            'searchDelay' => 350,
            'language'    => [
                'url' => url( 'zh.json' )
            ],
        ] )->columns( [
            [ 'data' => 'id', 'name' => 'id', 'title' => trans( 'common.number' ) ],
            [ 'data' => 'post_title', 'name' => 'user_id', 'title' => '文章标题' ],
            [ 'data' => 'user_name', 'name' => 'post_id', 'title' => '用户昵称' ],
            [ 'data' => 'parents', 'name' => 'pid', 'title' => '评论对象' ],
            [ 'data' => 'content', 'name' => 'content', 'title' => '评论内容' ],

            [ 'data' => 'created_at', 'name' => 'created_at', 'title' => trans( 'menu.created_at' ) ],
            [ 'data' => 'updated_at', 'name' => 'updated_at', 'title' => trans( 'menu.updated_at' ) ],
        ] )->addAction( [ 'data' => 'action', 'name' => 'action', 'title' => trans( 'common.action' ) ] );;

        return view( 'Backend.comment.index', compact( 'html' ) );
    }

    public function ajaxData() {

        $comment = Comment::with([
            'post' => function ($query) {
                $query->select('id','post_title');
            }
        ])->with([
            'user' => function ($query) {
                $query->select('id','name');
            }
        ])->orderBy('created_at','desc')->get(['id','user_id','post_id','pid','content', 'created_at',
            'updated_at',]);

        return DataTables::of( $comment )
            ->editColumn('post_title', function ($comment) {
                return   $comment->post->post_title;
            })
            ->editColumn('user_name', function ($comment) {
                return   $comment->user->name;
            })
            ->editColumn('parents', function ($comment) {
                if($comment->pid == 0){
                    return   "回复对象为文章";
                }else{
                    return   "回复对象为ID:".$comment->pid."的评论";
                }
            })
            ->addColumn( 'action', function ( $comment  ) {
                return getViewActionButton('post.show',$comment->post->id."#li-comment-".$comment->id) . getDestroyActionButton( $comment->id, $this->module );
            } )

            ->toJson();
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
            return redirect()->back()->with('success','回复成功');
        }else{
            return redirect()->back()->with('error','回复失败');
        }
    }

    public function destroy($id)
    {
        try {
            if ($this->CommentRepository->delete($id)) {
                return redirect()->back()->with('success','删除评论成功');
            } else {
                return redirect()->back()->with('error','删除评论失败');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', '删除评论失败！' . $e->getMessage());
        }
    }
}
