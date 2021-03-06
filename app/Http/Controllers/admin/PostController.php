<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Comment;
use Illuminate\Contracts\Auth\Access\Gate;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Services\PostService;
use App\Http\Model\Post;
use App\Http\Model\Tag as Tags;
use App\Repositories\CategoryRepository as Category;
use App\Repositories\UserRepository as User;
use App\Repositories\TagRepository as Tag;
use Image;
use Illuminate\Auth\Middleware;
use DB;
use EndaEditor;



/**
 * Class PostController
 * @package App\Http\Controllers\Admin
 */
class PostController extends Controller
{

    protected $Category;
    protected $Post;
    protected $module = 'post';

    public function __construct(
        PostService $PostService,
        Category $Category,
        Post $Post,
        Post $posts,
        Tag $Tag,
        User $User
    )
    {
        $this->middleware('isadmin')->except('list', 'show');
        $this->postService = $PostService;
        $this->category = $Category;
        $this->tag = $Tag;
        $this->post = $Post;
        $this->user = $User;
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function index(Builder $builder)
    {
        //dd($this->ajaxData());
        if (request()->ajax()) {
            return $this->ajaxData();
        }
        $html = $builder->parameters([
            'searchDelay' => 350,
            'language' => [
                'url' => url('zh.json')
            ],
        ])->addIndex(['data' => 'DT_Row_Index', 'name' => 'DT_Row_Index', 'title' => '序号'])
            ->columns([
                ['data' => 'id', 'name' => 'id', 'title' => trans('common.number')],
                ['data' => 'post_title', 'name' => 'post_title', 'title' => '标题'],
                ['data' => 'post_author', 'name' => 'post_author', 'title' => '作者'],
                ['data' => 'post_category', 'name' => 'post_category', 'title' => '分类'],
                ['data' => 'post_tag', 'name' => 'post_tag', 'title' => '标签'],
                ['data' => 'comments_status', 'name' => 'comments_status', 'title' => '评论状态'],
                ['data' => 'comments_count', 'name' => 'comments_count', 'title' => '评论数'],
                ['data' => 'followers_count', 'name' => 'followers_count', 'title' => '阅读数'],
                ['data' => 'created_at', 'name' => 'created_at', 'title' => trans('menu.created_at')],
                ['data' => 'updated_at', 'name' => 'updated_at', 'title' => trans('menu.updated_at')],
            ])->addAction([
                'data' => 'action',
                'name' => 'action',
                'title' => trans('common.action')
            ]);

        return view('Backend.post.index', compact('html'));
    }

    public function ajaxData()
    {
        $tmp = Post::with([
            'category' => function ($query) {
                $query->select('id', 'name');
            }
        ])->with([
            'tag' => function ($query) {
                $query->select('id', 'name');
            }
        ])->with([
            'user' => function ($query) {
                $query->select('id', 'name');
            }
        ])->orderBy('id','desc')->get([
            'id',
            'post_title',
            'post_author',
            'post_category',
            'comments_count',
            'followers_count',
            'created_at',
            'updated_at',
            'comments_status'
        ]);

        return DataTables::of($tmp)->escapeColumns([])->addIndexColumn()
            ->editColumn('comments_status', function ($tmp) {
                if ($tmp->comments_status == "on"){
                    return "<span class=\"m-badge m-badge--accent m-badge--dot\"></span> <span class=\"m--font-bold m--font-accent\">" . $tmp->comments_status . "</span>";
                }else{
                    return "<span class=\"m-badge m-badge--danger m-badge--dot\"></span> <span class=\"m--font-bold m--font-danger\">" . $tmp->comments_status . "</span>";
                }
            })
            ->editColumn('post_tag', function ($post) {
                $tag = '';
                if (count($post->tag) > 1) {
                    foreach ($post->tag as $item) {
                        $tag .= "<a class=\"btn btn-success\"><i class=\"fa fa-tag\"></i> " . $item->name . "</a>";
                    }
                } elseif (count($post->tag) == 1) {
                    $tag = "<a class=\"btn btn-success\">tag: " . $post->tag[0]->name . "</a>";
                }
                return $tag;
            })
            ->editColumn('post_category', function ($post) {
                return '<span class="label label-sm label-success">' . $post->category->name . '</span>';
            })
            ->editColumn('post_author', function ($post) {
                return  $post->user->name;
            })
            ->editColumn('comments_count', function ($post) {
                return  "<span class=\"badge badge-success\">" . $post->comments_count. "</span>";
            })
            ->editColumn('followers_count', function ($post) {
                return  "<span class=\"badge badge-success\">" .$post->followers_count. "</span>";
            })
            ->addColumn('action', function ($PostRepository) {
                return getViewActionButton('post.show',$PostRepository->id) . getActionButtonAttribute($PostRepository->id, $this->module);
            })->make(true);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('Backend.post.create', [
            'categories' => $this->category->all(),
            'tags' => $this->tag->all(),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return $this|PostController|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request,Post $post)
    {


        if ($this->Validator($request)) {
            return $this->Validator($request);
        }

        $post = $this->postService->store($request);
        if ($post) {
            return redirect()->route('post.index')->with('success', '文章' . $request->post_title . '创建成功');
        } else {
            return redirect()->back()->withInput($request->all())->with('error','文章' . $request->post_title . '创建失败');
        }
    }

    public function updateTagSum($tags)
    {
        foreach ($tags as $tagid) {
            $result = $this->tag->find($tagid);
            $count = $result->getTagSum();
            $this->tag->update(['count' => $count], $tagid);
        }
    }

    public function updateCategorySum($category_id)
    {
        $count = $this->post->findWhere(['post_category' => $category_id])->count();
        $this->category->update(['count' => $count], $category_id);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = $this->post->find($id);
        $category = $this->category->find($post->post_category);
        $tags = $this->tag->all(['id','name']);
        $categories = $this->category->all(['id','name']);
        $currentTag = $post->getTag();
        foreach ($currentTag as $item) {
            $sel_tag_arr[] = $item->id;
        }
        return view('Backend.post.edit', compact('post', 'category', 'tags', 'categories', 'sel_tag_arr'));

    }

    /**
     * @param $request
     *
     * @return $this
     */
    public function Validator($request)
    {

        $rules = [
            'post_title' => 'required|unique:posts|max:255',
            //'post_slug' => 'required',
            'post_tag' => 'required',
            'post_category' => 'required',
            'post_content' => 'required',
        ];
        $messages = [
            'post_title.required' => '标题不能为空',
            'post_title.max' => '标题最长不能超过255字符',
            //'post_slug.required' => 'slug不能为空',
            'post_tag.required' => '至少选择一个标签',
            'post_category.required' => '选择一个分类',
            'post_content.required' => '文章内容不能为空',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    }


    /**
     * @param $id
     * @param Request $request
     *
     * @return $this|PostController|\Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {

        $rules = [
            'post_title' => 'required|max:255',
            'post_content' => 'required',
            'post_category' => 'required',
            'post_tag' => 'required',
        ];
        $messages = [
            'post_title.required' => '标题不能为空',
            'post_title.max' => '标题最长不能超过255字符',
            'category.required' => '分类不能为空',
            'post_tag.required' => '至少选择一个标签',
            'post_content.required' => '文章内容不能为空',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        //$request['post_author'] = "Slionx";
        //$request->post_slug = title_case( str_slug( $request->post_slug, '-' ) );//slug标题自动大写 空格转-方便SEO
        if ($this->post->update($request->all(), $id)) {
            if (is_array($request->post_tag)) {
                foreach ($request->post_tag as $tag) {
                    $tags[] = $this->tag->find($tag)->id;
                }
                $post = $this->post->find($id);
                $post->syncTag($tags);
                $this->updateTagSum($request->post_tag);
            }
            $this->updateCategorySum($request->post_category);

            return redirect()->route('post.index')->with('success', '文章' . $request['post_title'] . '更新成功');
        } else {
            return redirect()->back()->withInput($request->all())->with('error', '文章' . $request['post_title'] .'更新失败！');
        }
    }


    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            if ($this->post->delete($id)) {
                return redirect()->route('post.index')->with('success', '删除成功！');
            } else {
                return redirect()->back()->with('error', '删除失败！');
            }
        } catch (Exception $e) {
            return redirect()->route('post.index')->with('error', '删除失败！' . $e->getMessage());
        }
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function tags()
    {
        return view('admin.tags');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $post = $this->post->find( $id );
        //$this->authorize('update', $post);

/*        if (!auth()->user()->can('update',$post)) {
            abort(403);
        }*/
        $this->authorize('show',$post);



        $post = Post::with([
            'category' => function ($query) {
                $query->select('id', 'name');
            }
        ])->with([
            'tag' => function ($query) {
                $query->select('id', 'name');
            }
        ])->with([
            'user' => function ($query) {
                $query->select('id', 'name');
            }
        ])->with([
            'comments' => function ($query) {
                $query->with([
                    'user' => function ($query) {
                        $query->select('id', 'name','avatar');
                    }
                ])->select(DB::raw('id,user_id,post_id,pid,path,content,created_at,concat(path,",",id) as paths'))->orderBy('paths')->get();
            }
        ])->orderBy('created_at', 'desc')->findOrFail($id, [
            'id',
            'post_author',
            'post_title',
            'post_content',
            'post_category',
            'comments_count',
            'followers_count',
            'post_password',
            'created_at',
            'comments_status'
        ]);




        if ($post->post_password && $post->post_author != auth()->user()->id) {
            return redirect()->route('post.list');
        }
        $comment_count = count($post->comments);

        $comments = $this->getSubTree($post->comments);

        //dd($rssss);


        $followers_count = $post->followers_count + 1;
        $this->post->update(['followers_count' => $followers_count], ['id'=>$id]);
        $tags = $this->tag->all(['id', 'name', 'count']);
        $categories = $this->category->all(['id', 'name', 'count']);

        $hot = Post::orderBy('followers_count', 'desc')->take(3)->get(['id', 'post_title', 'followers_count']);
        $reply =  Comment::with([
            'post' => function ($query) {
                $query->select('id', 'post_title');
            }
        ])->select(DB::raw('id,post_id,count(id) as count'))->groupBy('post_id')->orderBy('count','desc')->take(3)->get();

        //dd($reply);
        $prev_post = Post::where('id', '<', $id)->first(['id', 'post_title']);
        $prev_post = $prev_post ? $prev_post : '';
        $next_post = Post::where('id', '>', $id)->first(['id', 'post_title']);
        $next_post = $next_post ? $next_post : '';

        return view('desktop.post.show', compact('post', 'tags', 'categories', 'prev_post', 'next_post', 'hot','comments','comment_count','reply'));
    }

    public function getSubTree($data   , $pid = 0, $lev = 0) {
        $tmp = array();
        foreach ($data as $key => $value) {
            if($value['pid'] == $pid) {
                $value['child'] = $this->getSubTree($data ,  $value['id']);
                $tmp[] = $value;
                //$tmp = array_merge($tmp , $this->getSubTree($data ,  $value['id'] , $lev+1));
            }
        }
        return $tmp;
    }


    /**
     * @param null $param
     * @param null $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list($param = null, $id = null, Request $request)
    {

        //dd($request);
        if ($param == 'tag') {
            $post = Tags::findOrFail($id, ['id'])->getPosts();
        } else {
            $post = Post::with([
                'category' => function ($query) {
                    $query->select('id', 'name');
                }
            ])->with([
                'tag' => function ($query) {
                    $query->select('id', 'name');
                }
            ])->with([
                'user' => function ($query) {
                    $query->select('id', 'name');
                }
            ])->orderBy('created_at', 'desc')->
            where(function ($query) use ($request, $param, $id) {
                $keyword = trim($request->keyword);
                if ($keyword) {
                    $key = "%$keyword%";
                    $query->where('post_title', 'like', $key)->orWhere('post_slug', 'like', $key);
                }
                if ($param == "category") {
                    $query->where('post_category', '=', $id);
                }
            })->paginate(4, [
                'id',
                'post_author',
                'post_title',
                'post_slug',
                'post_content',
                'post_category',
                'comments_count',
                'followers_count',
                'post_password',
                'created_at'
            ]);
        }

        $hot = Post::orderBy('followers_count', 'desc')->take(3)->get(['id', 'post_title', 'followers_count']);
        //dd($hot);
        $reply =  Comment::with([
            'post' => function ($query) {
                $query->select('id', 'post_title');
            }
        ])->select(DB::raw('id,post_id,count(id) as count'))->groupBy('post_id')->orderBy('count','desc')->take(3)->get();

        $tags = $this->tag->all(['id', 'name', 'count']);
        $categories = $this->category->all(['id', 'name', 'count']);

        return view('desktop.post.list', compact('post', 'tags', 'categories', 'hot','reply'));
    }

    /**
     * Display a listing of the posts.
     *
     * @return Response
     */
    public function categories()
    {
        return view('admin.categories');
    }


}
