<?php

/*
 *
 *
dd(Hash::make('password'));
dd(app('make')->make('password'));
dd(app()['hash']->make('password'));
dd(app('Illuminate\Hashing\BcryptHasher')->make('pwassword'));

try_files $uri $uri/ /index.php?$query_string;

//服务容器的产生

入口index.php
自动加载
require __DIR__.'/../bootstrap/autoload.php';
服务容器生成
$app = require_once __DIR__.'/../bootstrap/app.php';
服务容器创建
$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);


//服务绑定
//普通模式绑定回调函数 --回调函数服务绑定
        $this->app-bind(App\Services\testService::class ,function ($app){
        	return new App\Services\testService();
        });

//单例模式绑定回调函数  --回调函数服务绑定
        $this->app->singleton(App\Services\testService::class ,function ($app){
	        return new App\Services\testService();
        });

//绑定实例对象  --实例对象服务绑定
		$test = new App\Services\testService();
        $this->app->instance('testService',$test);

//绑定具体类名称

		$this->app->bind('App\Contracts\Contracts::class','App\Repositories\Contracts::class');
//这种情况，服务为类名的会通过服务容器中的getClosure()函数自动生成创建该类实例对象的回调函数并进行绑定，服务名称用接口名更好

//服务解析
app(some::class);
app()['some::class'];
app('Illuminate\Hashing\BcryptHasher');
\App::make(some::class);


php artisan key:generate

php artisan make:controller admin/SlideController -r  //资源路由

php artisan help make:controller

php artisan storage:link



创建表
php artisan make:migration create_users_table

php artisan make:migration create_images_table

php artisan make:migration create_users_table --create=users

php artisan make:migration create_category_table --create=category   //创建表

php artisan make:migration add_votes_to_users_table --table=users    //更新表

php artisan make:request StorePostRequest    //创建 request

生成表
php artisan migrate

composer dumpautoload

php artisan migrate:refresh  刷新表

php artisan migrate:refresh --seed

 php artisan make:migration add_asd_to_notice --table=notices

------------追加字段----------------
假设是users表
php artisan make:migration add_votes_to_users_table --table=users
加votes字段
Schema::table('users', function ($table) {
    $table->bigInteger('votes');
});
最后
php artisan migrate

php artisan make:migration notices    追加字段

php artisan migrate:refresh --seed

php artisan make:migrition

------------追加字段----------------





注意: 如果在执行迁移时发生「class not found」错误，试着先执行 composer dump-autoload 命令后再进行一次。

php artisan make:migration add_excerpt_to_articles_table --table=articles    //也可以创建一个新的迁移文件：追加excerpt字段

php artisan make:seeder UserTableSeeder

php artisan db:seed

php artisan db:seed --class=UserTableSeeder

php artisan help make:controller

php artisan key:generate

Usage:
  command [options] [arguments]

Options:
  -h, --help            Display this help message
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi            Force ANSI output
      --no-ansi         Disable ANSI output
  -n, --no-interaction  Do not ask any interactive question
      --env[=ENV]       The environment the command should run under
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  clear-compiled       Remove the compiled class file
  down                 Put the application into maintenance mode
  env                  Display the current framework environment
  help                 Displays help for a command
  inspire              Display an inspiring quote
  list                 Lists commands
  migrate              Run the database migrations
  optimize             Optimize the framework for better performance
  serve                Serve the application on the PHP development server
  up                   Bring the application out of maintenance mode
 app
  app:name             Set the application namespace
 auth
  auth:clear-resets    Flush expired password reset tokens
 cache
  cache:clear          Flush the application cache
  cache:forget         Remove an item from the cache
  cache:table          Create a migration for the cache database table
 config
  config:cache         Create a cache file for faster configuration loading
  config:clear         Remove the configuration cache file
 db
  db:seed              Seed the database with records
 debugbar
  debugbar:clear       Clear the Debugbar Storage
 event
  event:generate       Generate the missing events and listeners based on registration
 key
  key:generate         Set the application key
 make
  make:auth            Scaffold basic login and registration views and routes
  make:command         Create a new Artisan command
  make:controller      Create a new controller class
  make:event           Create a new event class
  make:job             Create a new job class
  make:listener        Create a new event listener class
  make:mail            Create a new email class
  make:middleware      Create a new middleware class
  make:migration       Create a new migration file
  make:model           Create a new Eloquent model class
  make:notification    Create a new notification class
  make:policy          Create a new policy class
  make:provider        Create a new service provider class
  make:request         Create a new form request class
  make:seeder          Create a new seeder class
  make:test            Create a new test class
 migrate
  migrate:install      Create the migration repository
  migrate:refresh      Reset and re-run all migrations
  migrate:reset        Rollback all database migrations
  migrate:rollback     Rollback the last database migration
  migrate:status       Show the status of each migration
 notifications
  notifications:table  Create a migration for the notifications table
 queue
  queue:failed         List all of the failed queue jobs
  queue:failed-table   Create a migration for the failed queue jobs database table
  queue:flush          Flush all of the failed queue jobs
  queue:forget         Delete a failed queue job
  queue:listen         Listen to a given queue
  queue:restart        Restart queue worker daemons after their current job
  queue:retry          Retry a failed queue job
  queue:table          Create a migration for the queue jobs database table
  queue:work           Start processing jobs on the queue as a daemon
 route
  route:cache          Create a route cache file for faster route registration
  route:clear          Remove the route cache file
  route:list           List all registered routes
 schedule
  schedule:run         Run the scheduled commands
 session
  session:table        Create a migration for the session database table
 storage
  storage:link         Create a symbolic link from "public/storage" to "storage/app/public"
 vendor
  vendor:publish       Publish any publishable assets from vendor packages
 view
  view:clear           Clear all compiled view files


*/
