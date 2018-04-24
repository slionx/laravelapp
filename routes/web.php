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

// User Auth
Auth::routes();

   /* Route::get('password/reset', function () {
    	$token =  12321321332121323;
        return view('email.resetpassword',compact( 'token' ));
    });*/


Route::post('password/change', 'HomeController@changePassword')->middleware('auth');
Route::get('home/{id}/edit', 'HomeController@edit')->name('edit');
Route::post('home/run_edit', 'HomeController@run_edit')->name('run_edit');
Route::post('user/upload/avatar', 'admin\UserController@update')->name('uploadAvatar');

/*
 * admin 路由组
 * admin spacename
 * */
/*Route::group(['prefix' => 'admin','middleware' => ['web','admin.login'],'namespace'=>'Admin'], function () {
    Route::get('index', 'IndexController@index')->name('index');

});*/
Route::get('/', 'HomeController@welcome');


Route::get('home/login', function () {
    return view('auth.login');
});
Route::get('home/changepw', function () {
    return view('home/changepw');
});

Route::post('home/changepw', 'HomeController@changePassword')->name('changePassword');

Route::get('email/verify/{token}','admin\UserController@verify')->name('email.verify');

/*Route::get('post/list/', function () {
    echo 1;
})->name('post.list');*/

Route::get('post/list/', 'admin\PostController@list')->name('post.list');

Route::get('post/list/{tag}/{id}/', 'admin\PostController@list')->name('post.list.tag');
Route::get('post/list/{category}/{id}', 'admin\PostController@list')->name('post.list.category');
Route::get('post/{post}/', 'admin\PostController@show')->name('post.show');


Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => ['auth','web','menu','isadmin']], function () {
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
	//欢迎页路由
	Route::resource('welcome' ,'WelcomeController');

	//Route::get('/welcome/index', 'WelcomeController@index')->name('welcome.index');
	Route::get('uploadSlideImages', 'WelcomeController@create')->name('G_uploadImages');
	Route::post('uploadSlideImages', 'WelcomeController@uploadSlideImages')->name('P_uploadImages');
	//Route::post('/welcome', 'WelcomeController@store')->name('welcome.store');

    Route::get('/', 'PostController@index')->name('admin');

	/*Route::get('/post/index', 'PostController@index')->name('post.index');
	Route::get('/post/create', 'PostController@create')->name('post.create');
	Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');
	Route::delete('/post/{post}', 'PostController@destroy')->name('post.destroy');
	Route::post('/post', 'PostController@store')->name('post.store');
	Route::put('/post/{post}', 'PostController@update')->name('post.update');
    Route::get('post/upload_img', 'PostController@upload_img');
    Route::post('post/upload_img', 'PostController@upload_img');*/

    Route::resource('post' ,'PostController')->except('show');

	Route::resource('menu' ,'MenuController');
	Route::resource('permission' ,'PermissionController');
	Route::resource('role' ,'RoleController');
	Route::resource('user' ,'UserController');
	Route::resource('category' ,'CategoryController');
    Route::resource('tag', 'TagController');

/*    Route::get('menu/{id}/edit', function ($id) {
        //
    })->name('menu.edit');*/

	Route::get('/image', 'PostController@image');
	Route::get('/upload', 'PostController@upload');



});
Route::group(['middleware' => ['web','auth']], function () {
/*    Route::get('/login', function () {
        return view('auth.login');
    });*/

    Route::get('/home', 'HomeController@index');

/*    Route::get('/reset', function () {
        return view('auth.passwords.reset');
    });*/
});





