<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;


class CategoryController extends Controller
{

	/**
	 * Display index page.
	 *
	 * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(Builder $builder)
	{
		if (request()->ajax()) {
			return DataTables::of(Category::query())->toJson();
		}

		$html = $builder->parameters([
			'searchDelay' => 350,
			'language' => [
				'url' => url('zh.json')

		],
		])->columns([
			['data' => 'id', 'name' => 'id', 'title' => trans('common.number')],
			['data' => 'name', 'name' => 'name', 'title' => 'Name'],
			['data' => 'sort', 'name' => 'sort', 'title' => 'Sort'],
			['data' => 'created_at', 'name' => 'created_at', 'title' => trans('menu.created_at')],
			['data' => 'updated_at', 'name' => 'updated_at', 'title' => trans('menu.updated_at')],
            ]);

    return view('admin.table', compact('html'));

/*		$html = Builder::parameters([
			'searchDelay' => 350,
			'drawCallback' => <<<Eof
					function() {
				        LaravelDataTables["dataTableBuilder"].$('.tooltips').tooltip( {
				          placement : 'top',
				          html : true
				        });
			        },
Eof
		])->addIndex(['data' => 'DT_Row_Index', 'name' => 'DT_Row_Index', 'title' => ''])
		               ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'id'])
		               ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'name'])
		               ->addColumn(['data' => 'sort', 'name' => 'sort', 'title' => 'sort'])
		               ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'created_at'])
		               ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'updated_at'])
		               ->addAction(['data' => 'action', 'name' => 'action', 'title' => 'action']);*/


		//return compact('html');
		//return view('admin.table');
	}

	/**
	 * Process dataTable ajax response.
	 *
	 * @param \Yajra\Datatables\Datatables $datatables
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function data(Datatables $datatables)
	{
		$builder = Category::query()->select('id', 'name', 'sort', 'created_at', 'updated_at');

		return $datatables->eloquent($builder)
		                  ->editColumn('name', function ($user) {
			                  return '<a>' . $user->name . '</a>';
		                  })
		                  ->addColumn('action', 'eloquent.tables.users-action')
		                  ->rawColumns(['name', 'action'])
		                  ->make(true);
	}

	/*    public function index()
		{
			//$category = new Category;
			//return $categorise = $category->all()->toJson();
			//return view('admin.categories', compact('categorise'));
			return view('admin.categories');

		}*/

	public function show(Request $request){
		$category = new Category;
		$count = $category->count();
		$data = $category->all();
		$output['data'] = $data;
		$output['draw'] = $count;

		return json_encode($output);


	}

	public function create(  ) {
		return view('admin.categories');

	}

	public function store(Request $request){

		$validator = Validator::make($request->all(), [
			'name' => 'required|unique:category|max:255',
			'sort' => 'required|numeric',
		]);
		if ($validator->fails()) {
			return back()
				->withErrors($validator)
				->withInput($request->all());
		}
		$category = new Category;
		$category->name = $request->input('name');
		$category->sort = $request->input('sort');
		$result = $category->save();

		/*     save([
				 'name'=>$request->input('name'),
				 'sort'=>$request->input('sort'),
			 ]);*/
		echo 'sucess';

	}


}