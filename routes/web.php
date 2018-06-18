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

// Notifications
Route::get('run', 'NotificationController@store');
Route::post('notifications', 'NotificationController@store');
Route::get('notifications', 'NotificationController@index');
Route::post('notifications/{id}/read', 'NotificationController@markAsRead');
Route::post('notifications/mark-all-read', 'NotificationController@markAllRead')->name('mark-all-read');

// User Auth
Auth::routes();

Route::get('/','HomeController@index');
Route::get('/demo','HomeController@demo');

Route::post('user/upload/avatar', 'admin\UserController@update')->name('uploadAvatar');

Route::get('email/verify/{token}','admin\UserController@verify')->name('email.verify');

Route::get('post/list/', 'admin\PostController@list')->name('post.list');
Route::get('post/list/{search}/', 'admin\PostController@list')->name('post.list.search');
Route::get('post/list/{tag}/{id}/', 'admin\PostController@list')->name('post.list.tag');
Route::get('post/list/{category}/{id}', 'admin\PostController@list')->name('post.list.category');
Route::get('post/{post}/', 'admin\PostController@show')->name('post.show');
Route::post('comment', 'admin\CommentController@store')->name('comment.store');

Route::group(['namespace' => 'Admin','middleware' => ['auth','web','isadmin']], function () {
    Route::delete('comment/{comment}/', 'CommentController@destroy')->name('desktop.comment.delete');//只能管理员删除前台评论，否则回退
});

/*
 * admin 路由组
 * admin spacename
 * */
Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => ['auth','web','isadmin']], function () {
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
	Route::post('welcome/upload', 'WelcomeController@upload')->name('welcome.upload');
    Route::get('dashboard/index', 'DashboardController@index')->name('admin');
    Route::resource('post' ,'PostController')->except('show');
	Route::resource('menu' ,'MenuController');
	Route::resource('permission' ,'PermissionController');
	Route::resource('role' ,'RoleController');
	Route::resource('user' ,'UserController');
	Route::resource('category' ,'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('dashboard', 'DashboardController');

    Route::get('comment', 'CommentController@index')->name('comment.index');
    Route::delete('comment/{comment}', 'CommentController@destroy')->name('comment.destroy');
    Route::post('settings', 'SettingsController@UpdateSet')->name('settings.UpdateSet');


});






