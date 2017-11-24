<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Model;


array (
	'draw' => '1',
	'columns' =>
		array (
			0 =>
				array (
					'data' => 'id',
					'name' => '',
					'searchable' => 'true',
					'orderable' => 'true',
					'search' =>
						array (
							'value' => '',
							'regex' => 'false',
						),
				),
			1 =>
				array (
					'data' => 'name',
					'name' => '',
					'searchable' => 'true',
					'orderable' => 'true',
					'search' =>
						array (
							'value' => '',
							'regex' => 'false',
						),
				),
			2 =>
				array (
					'data' => 'sort',
					'name' => '',
					'searchable' => 'true',
					'orderable' => 'true',
					'search' =>
						array (
							'value' => '',
							'regex' => 'false',
						),
				),
			3 =>
				array (
					'data' => 'created_at',
					'name' => '',
					'searchable' => 'true',
					'orderable' => 'true',
					'search' =>
						array (
							'value' => '',
							'regex' => 'false',
						),
				),
			4 =>
				array (
					'data' => 'updated_at',
					'name' => '',
					'searchable' => 'true',
					'orderable' => 'true',
					'search' =>
						array (
							'value' => '',
							'regex' => 'false',
						),
				),
		),
	'order' =>
		array (
			0 =>
				array (
					'column' => '0',
					'dir' => 'asc',
				),
		),
	'start' => '0',
	'length' => '10',
	'search' =>
		array (
			'value' => '',
			'regex' => 'false',
		),
	'_token' => 'cSafjMOIBUsVV9ShKv6M7x50NY1tReVSsCKJcp6u',
	'_' => '1511494322453',
);

class CategoryController extends Controller
{
    public function index()
    {
        //$category = new Category;
	    //return $categorise = $category->all()->toJson();
        //return view('admin.categories', compact('categorise'));
	    return view('admin.categories');

    }

    public function show(Request $request){
	    $filename="ntmzn.txt";
	    $handle=fopen($filename,"a+");
	    fwrite($handle,var_export($request->all(),true));
	    fclose($handle);
	    $category = new Category;
	    $count = $category->count();
	    $data = $category->all();
	    $output['data'] = $data;
	    $output['draw'] = $count;

	    return json_encode($output);


    }

    public function create(Request $request){

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