<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Task;
use Illuminate\Http\Request;



Route::get('/num','HomeController@index');
// User Auth
Auth::routes();
Route::post('password/change', 'HomeController@changePassword')->middleware('auth');

Route::get('home/{id}/edit', 'HomeController@edit')->name('edit');

Route::post('home/run_edit', 'HomeController@run_edit')->name('run_edit');

Route::post('user/upload/avatar', 'UserController@update')->name('uploadAvatar');


/*Route::get('user/{id}/edit', array('before' => 'auth|csrf', function($id)->middleware('auth');
{


}));*/


/*Route::get('user',['as' => 'profile',function () {
    echo  Route('profile');
    return 'mm';
}]);*/
/*
Route::get('ic',[
    'as' => 'ic','uses' => 'Admin\IndexController@index'
]);*/


//Route::resource('article','Admin\ArticleController');
Route::resource('article', 'ArticleController');
/*
 * admin 路由组
 * admin spacename
 * */
/*Route::group(['prefix' => 'admin','middleware' => ['web','admin.login'],'namespace'=>'Admin'], function () {
    Route::get('index', 'IndexController@index')->name('index');

});*/
Route::get('home/index', function () {

    return view('welcome');
});


Route::get('home/login', function () {
    return view('auth.login');
});

Route::get('home/changepw', function () {
    return view('home/changepw');
});

Route::post('home/changepw', 'HomeController@changePassword')->name('changePassword');
Route::get('user', 'UserController@AllUser');

//Route::get('login', 'IndexController@login')->name('login');


Route::get('/test', 'HomeController@index');



Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => ['adminlogin','web']], function () {

    Route::get('/index', 'PostController@index');
    Route::get('/tags', 'PostController@tags');
    Route::get('/image', 'PostController@image');
    Route::get('/upload', 'PostController@upload');
    Route::get('/post', 'PostController@post');
    Route::get('/categories', 'PostController@categories');

    //tag
    Route::post('/tag', 'TagController@create');


});

Route::group(['middleware' => ['web','auth']], function () {
    Route::get('/login', function () {
        return view('auth.login');
    });

    Route::get('/home', function () {
        return view('home');
    });



    Route::get('/reset', function () {
        return view('auth.passwords.reset');
    });
    Route::get('/', function () {
        return view('welcome');
    });

    /**
     * Show Task Dashboard
     */
    Route::get('/addtasks', function () {
        return view('tasks', [
            'tasks' => Task::orderBy('created_at', 'asc')->get()
        ]);
    });

    /**
     * Add New Task
     */
    Route::post('/task', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    });

    /**
     * Delete Task
     */
    Route::delete('/task/{id}', function ($id) {
        Task::findOrFail($id)->delete();

        return redirect('/');
    });
});




/*
Route::get('user/profile', function () {
    return 'so what \'s this';
})->name('profile');

Route::get('/user/{id}', function ($id) {  //get��ȡ����
    return 'User:'.intval($id);
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) { //get��ȡ�������
    return 'Posts:'.$postId.' comments:'.$commentId;
});

Route::get('/posts', function () {
    return view('post');
});

Route::get('user/{name?}', function ($name = 'John') {
    return $name;
});

Route::post('/post_get', function () {
    return view('post_get');
});

Route::match(['get', 'post'], '/', function () {
    return 'hello there';
});

Route::any('foo', function () {
    return 'hello foo';
});
*/


