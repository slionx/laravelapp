<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use App\Repositories\TagRepository as Tag;

class TagController extends Controller
{

    public function __construct( Tag $tag)
    {
    	$this->tag = $tag;
    }

    protected $module = 'tag';

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
            [ 'data' => 'name', 'name' => 'name', 'title' => '名称' ],
            [ 'data' => 'count', 'name' => 'count', 'title' => '数量' ],
            [ 'data' => 'created_at', 'name' => 'created_at', 'title' => trans( 'menu.created_at' ) ],
            [ 'data' => 'updated_at', 'name' => 'updated_at', 'title' => trans( 'menu.updated_at' ) ],
        ] )->addAction( [ 'data' => 'action', 'name' => 'action', 'title' => trans( 'common.action' ) ] );;

        return view( 'admin.tag.index', compact( 'html' ) );

    }

    public function ajaxData() {

        return DataTables::of( $this->tag->all() )
            ->addColumn( 'action', function ( $tag ) {
                return getActionButtonAttribute( $tag->id, $this->module );
            } )
            ->toJson();
    }

    public function create(){
        return view( 'admin.tag.create' );
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:tags|max:255',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput($request->all());
        }
        $data['name'] = $request['name'];
        $result = $this->tag->create($data);
        if($result){
            return Redirect('admin/tag')->with('success', trans('common.tag') . $request['name'] . '创建成功');
        }else{
            return Redirect('admin/tag/create')->withErrors(trans('common.tag') . $request['name'] . '创建失败');
        }

    }

	public function edit( $id ) {
    	$tag = $this->tag->find($id);
		return view('admin.tag.edit', compact('tag','id'));
    }

	public function update( Request $request,$id ) {
		try {
			$validator = Validator::make( $request->all(), [
				'name' => 'required|max:255',
			] );
			if ($validator->fails()) {
				return back()
					->withErrors($validator)
					->withInput($request->all());
			}
			$bool = $this->tag->update($request->all(),$id);
			if ($bool){
				return Redirect( 'admin/tag' )->with( 'success', '编辑成功' );
			}else{
				return Redirect( 'admin/tag' )->with( 'error', '编辑失败' );
			}
		} catch (Exception $e) {
			return Redirect( 'admin/tag' )->with( 'error', '编辑失败'.$e->getMessage() );
		}
		
    }

	public function destroy( $id ) {
		try {
			$tag = $this->tag->find($id);
			$postTag = $tag->getPosts();
			foreach ( $postTag as $v ) {
				$tag->deletePosts($v->id);
			}
			$bool = $this->tag->delete($id);
			if ($bool){
				return Redirect( 'admin/tag' )->with( 'success', '删除成功' );
			}else{
				return Redirect( 'admin/tag' )->with( 'error', '删除失败' );
			}
		} catch (Exception $exception) {
			return Redirect( 'admin/tag' )->with( 'error', '删除失败' );
		}
    }

	public function show(  ) {
		
    }

}
