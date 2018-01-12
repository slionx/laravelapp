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

// User Auth
Auth::routes();


Route::post('password/change', 'HomeController@changePassword')->middleware('auth');

Route::get('home/{id}/edit', 'HomeController@edit')->name('edit');

Route::post('home/run_edit', 'HomeController@run_edit')->name('run_edit');

Route::post('user/upload/avatar', 'admin\UserController@update')->name('uploadAvatar');

Route::get('uploadImages', 'HomeController@create')->name('G_uploadImages');
Route::post('uploadImages', 'HomeController@uploadImages')->name('P_uploadImages');

Route::get('table', 'admin\CategoryController@index');

/*
 * admin 路由组
 * admin spacename
 * */
/*Route::group(['prefix' => 'admin','middleware' => ['web','admin.login'],'namespace'=>'Admin'], function () {
    Route::get('index', 'IndexController@index')->name('index');

});*/
Route::get('/', 'HomeController@welcome');

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

Route::get('/test', 'HomeController@index');
Route::get('email/verify/{token}','admin\UserController@verify')->name('email.verify');


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

	Route::resource('menu' ,'MenuController');
	Route::resource('permission' ,'PermissionController');
	Route::resource('role' ,'RoleController');
	Route::resource('user' ,'UserController');
	Route::resource('category' ,'CategoryController');

/*    Route::get('menu/{id}/edit', function ($id) {
        //
    })->name('menu.edit');*/

	Route::get('/image', 'PostController@image');
	Route::get('/upload', 'PostController@upload');
	Route::get('/post', 'PostController@post');

    Route::get('post/upload_img', 'PostController@upload_img');
    Route::post('post/upload_img', 'PostController@upload_img');

    //tag
    Route::get('/tag/show', 'TagController@index');
    Route::post('/tag', 'TagController@create');

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




