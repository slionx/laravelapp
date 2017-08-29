<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TagController extends Controller
{
    public function __construct()
    {

    }

    public function create(Request $request)
    {


        $this->validate($request, [
            'name' => 'required|unique:tags',
        ]);
        var_dump($request['name']);exit;

        if ($this->tagRepository->create($request)) {
            $this->tagRepository->clearCache();
            return back()->with('success', 'Tag' . $request['name'] . '创建成功');
        } else
            return back()->with('error', 'Tag' . $request['name'] . '创建失败');
    }

    public function preview() {
        return Markdown::parse(Input::get('content'));
    }
}

