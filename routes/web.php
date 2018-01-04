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

use Illuminate\Http\Request;



Route::get('/num','HomeController@index');
// User Auth
Auth::routes();

Route::post('password/change', 'HomeController@changePassword')->middleware('auth');

Route::get('home/{id}/edit', 'HomeController@edit')->name('edit');

Route::post('home/run_edit', 'HomeController@run_edit')->name('run_edit');

Route::post('user/upload/avatar', 'admin\UserController@update')->name('uploadAvatar');


/*Route::get('user/{id}/edit', array('before' => 'auth|csrf', function($id)->middleware('auth');
{


}));*/
Route::get('table', 'admin\CategoryController@index');

/*Route::get('user',['as' => 'profile',function () {
    echo  Route('profile');
    return 'mm';
}]);*/
/*
Route::get('ic',[
    'as' => 'ic','uses' => 'Admin\IndexController@index'
]);*/


//Route::resource('article','Admin\ArticleController');
//Route::resource('article', 'ArticleController');
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


//Route::get('login', 'IndexController@login')->name('login');


Route::get('/test', 'HomeController@index');
Route::get('email/verify/{token}','admin\UserController@verify')->name('email.verify');
/*Route::get('email/test/',function (){
	return view('email/test');
});*/
Route::get('/', function () {
	return view('welcome');
});

Route::get('post/list/', 'admin\PostController@post');
Route::resource('post','admin\PostController');

Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => ['auth','web','menu']], function () {
    //Route::get('/', 'PostController@index');
/*路由资源可用方法
 *
 *  GET	/posts	index	posts.index
	GET	/posts/create	create	posts.create
	POST	/posts	store	posts.store
	GET	/posts/{post}	show	posts.show
	GET	/posts/{post}/edit	edit	posts.edit
	PUT/PATCH	/posts/{post}	update	posts.update
	DELETE	/posts/{post}	destroy	posts.destroy
*/
	Route::get('/aa','TestController@index'); //测试路由

	Route::get('/test', 'RoleController@test');



/*	Route::get('/post/{post}', function () {
		//
	})->name('post.show');

echo route('post.show', ['post' => $post]);*/

    //menu
    //Route::get('/menu/show', 'MenuController@show');
    //Route::post('/menu', 'MenuController@create')->name('menu.create');
	Route::resource('menu' ,'MenuController');
	Route::resource('permission' ,'PermissionController');
	Route::resource('role' ,'RoleController');
	Route::resource('user' ,'UserController');

/*    Route::get('menu/{id}/edit', function ($id) {
        //
    })->name('menu.edit');*/

	//Route::get('/tags', 'PostController@tags');
	/*Route::get('/index', 'PostController@index');
	Route::get('/post/create/', 'PostController@create');
	Route::post('/post/store', 'PostController@store');*/

	Route::get('/image', 'PostController@image');
	Route::get('/upload', 'PostController@upload');
	Route::get('/post', 'PostController@post');

    Route::get('post/upload_img', 'PostController@upload_img');
    Route::post('post/upload_img', 'PostController@upload_img');

    //tag
    Route::get('/tag/show', 'TagController@index');
    Route::post('/tag', 'TagController@create');


    //category
   /* Route::get('/category', 'CategoryController@index');
	Route::get('/category/show', 'CategoryController@show')->name('category.show');
    Route::get('/category', 'CategoryController@create');
	Route::post('/category', 'CategoryController@store');*/
	Route::resource('category' ,'CategoryController');

});

Route::group(['middleware' => ['web','auth']], function () {
/*    Route::get('/login', function () {
        return view('auth.login');
    });*/

    Route::get('/home', function () {
        return view('home');
    });



/*    Route::get('/reset', function () {
        return view('auth.passwords.reset');
    });*/
});
Route::get('/home', 'HomeController@index')->name('home');



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


