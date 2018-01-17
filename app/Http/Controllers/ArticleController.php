<?php

namespace App\Http\ArticleControllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', array('only' => array('create', 'store', 'edit', 'update', 'destroy')));
    }

    public function create()
    {
        return View('articles.create');
    }

    public function preview() {
        return Markdown::parse(Input::get('content'));
    }
}


