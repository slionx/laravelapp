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

php artisan make:model Company -mcr
-m 创建迁移文件
-c 创建控制器文件
-r 为控制器添加资源操作方法

php artisan key:generate

php artisan ide-helper:generate

php artisan make:controller admin/SlideController --resource --model=user  //资源路由

php artisan make:controller admin/SlideController -r

php artisan help make:controller

php artisan storage:link

php artisan make:job SendMessage


创建表
php artisan make:migration create_users_table

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

php artisan db:backup 通过iseed库自动备份当前数据库的数据到Seeder文件里，解决研发时测试数据同步或临时数据结构变更测试数据面临清空等问题。并可根据migrations的文件顺序进行合理的排序，避免由于依赖关系引起的后续数据填充问题。
php artisan db:clear 清空数据库，心情不爽的时候用一下，感觉棒棒哒。
php artisan db:upgrade 升级数据库，可能加了新的字段等，会自动填充Seeder文件里的数据，升级之前最好先备份下数据。

------------追加字段----------------

redis-server.exe redis.windows.conf

-----------初始配置相关---------------

PHP 必须大于或等于 7.1.3
必须安装扩展 dom
必须安装扩展 fileinfo
必须安装扩展 gd
必须安装扩展 json
必须安装扩展 mbstring
必须安装扩展 openssl
必须安装 PDO
使用 MySQL 数据库则必须安装 PHP 扩展 pdo_mysql
使用 PostgreSQL 数据库则必须安装 PHP 扩展 pdo_pgsql
使用 SQLite 数据库则必须安装 PHP 拓展 pdo_sqlite
使用 SQL Server 数据库则必须安装 PHP 拓展 pdo_dblib

Nginx
如果你使用的是 Nginx，在你的站点配置中加入以下内容，它将会将所有请求都引导到 index.php 前端控制器：

location / {
    try_files $uri $uri/ /index.php?$query_string;
}

Apache
在 项目中 中，已经在根目录 /plulic 中已经提供了 .htaccess 文件，其中已经为您配置好了优雅的地址配置。

<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>

如果在你的 Apache 中不生效或者由其他位置提供配置，请设置：
Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]

安装项目依赖
composer install

生成.env
cp .env.example .env
php artisan key:generate

编辑.env环境配置
APP_DEBUG=true #关闭调试
DB_HOST= #数据库地址
DB_PORT=3306 #数据库端口
DB_DATABASE= #数据库名称
DB_USERNAME= #数据库用户
DB_PASSWORD= #数据库密码

运行数据迁移和数据填充
php artisan migrate
php artisan db:seed

php artisan make:notification GeneralNotification //创建通知

php artisan notifications:table

php artisan queue:listen

发布拓展包资源
php artisan vendor:publish --all


目录权限 & 公开资源
大多数时候为了方便，我们在服务器都是使用 root 作为服务器管理账户，可能你在下载 该项目 的时候也适用的 root 账户，这会产生一个问题，php-fpm 或者 nginx 不是运行在 root 账户下的，导致你实际运行站点的时候会出现莫名其妙的错误，你应该将你整个 项目 目录指定给 php 或者 nginx 的运行角色：


设置目录权限
chown -R nginx:nginx  storage/
chmod -R 755 public/
chown -R nginx:nginx  public/

目录	权限
/*	0755
/storage	0777
所有资源都存储在 /storage 目录下，所以你需要将公开资源链接到 /public 目录下，请务必执行：

创建软链
接下来我们需要在 public 目录下创建一个连到 storage/app/public 目录下的软链接：

 php artisan storage:link

初始化数据库  php artisan migrate:fresh && php artisan migrate:reset

导入sql mysql laravel < database/admin.sql

清除模板文件缓存 php artisan view:clear

调优
部署到线上可选，本地测试无需执行

php artisan optimize
php artisan config:cache
php artisan route:cache

-------------初始配置相关---------------



注意: 如果在执行迁移时发生「class not found」错误，试着先执行 composer dump-autoload 命令后再进行一次。

php artisan make:migration add_excerpt_to_articles_table --table=articles    //也可以创建一个新的迁移文件：追加excerpt字段

php artisan make:seeder UserTableSeeder

php artisan db:seed

php artisan db:seed --class=UserTableSeeder

php artisan help make:controller

php artisan key:generate

-------------尽可能使用更短、更易读的语法---------------

通用语法	                                                                更短、更可读的语法
Session::get('cart')	                                                session('cart')
$request->session()->get('cart')	                                    session('cart')
Session::put('cart', $data)	                                            session(['cart' => $data])
$request->input('name'), Request::get('name')	                        $request->name, request('name')
return Redirect::back()	                                                return back()
is_null($object->relation) ? $object->relation->id : null }	            optional($object->relation)->id
return view('index')->with('title', $title)->with('client', $client)	return view('index', compact('title', 'client'))
$request->has('value') ? $request->value : 'default';	                $request->get('value', 'default')
Carbon::now(), Carbon::today()	                                        now(), today()
App::make('Class')	                                                    app('Class')
->where('column', '=', 1)	                                            ->where('column', 1)
->orderBy('created_at', 'desc')	                                        ->latest()
->orderBy('age', 'desc')	                                            ->latest('age')
->orderBy('created_at', 'asc')	                                        ->oldest()
->select('id', 'name')->get()	                                        ->get(['id', 'name'])
->first()->name	                                                        ->value('name')


-------------Laravel 命名约定---------------

Controller	单数 	正确 ArticleController	错误 ArticlesController
Route	    复数	    正确 articles/1	        错误 article/1
Named route	带点符号的蛇形命名   正确 users.show_active	错误 users.show-active, show-active-users
Model	    单数	    正确 User	            错误 Users
hasOne or belongsTo relationship	单数      正确 articleComment  错误 articleComments, article_comment
All other relationships	            复数	      正确 articleComments    错误 articleComment, article_comments
Table	复数	    正确 article_comments	错误 article_comment, articleComments
Method	小驼峰命名	正确 getAll	错误 get_all
Method in test class	小驼峰命名	正确 testGuestCannotSeeArticle	错误 test_guest_cannot_see_article
Variable	小驼峰命名	正确 $articlesWithAuthor	    错误 $articles_with_author
Collection	具描述性的复数形式(数据变量名)	    正确 $activeUsers = User::active()->get()	错误 $active, $data
Object	具描述性的单数形式	正确 $activeUser = User::active()->first()	错误 $users, $obj
Config and language files index	蛇形命名	    正确 articles_enabled	错误 ArticlesEnabled; articles-enabled
View	蛇形命名	    正确 show_filtered.blade.php	    错误 showFiltered.blade.php, show-filtered.blade.php
Config	蛇形命名	    正确 google_calendar.php	    错误 googleCalendar.php, google-calendar.php
Contract (interface)	形容词或名词	    正确 Authenticatable	    错误 AuthenticationInterface, IAuthentication
Trait	形容词	正确 Notifiable	    正确 NotificationTrait

Method in resource controller  看下面表格
Verb	    URI	Action	            Route Name
GET	        /photos	index	        photos.index
GET	        /photos/create	        create	photos.create
POST	    /photos	store	        photos.store
GET	        /photos/{photo}	        show	photos.show
GET	        /photos/{photo}/edit	edit	photos.edit
PUT/PATCH	/photos/{photo}	        update	photos.update
DELETE	    /photos/{photo}	        destroy	photos.destroy

数据模型相关的命名规范：

数据模型类名 必须 为「单数」, 如：App\Models\Photo
类文件名 必须 为「单数」，如：app/Models/Photo.php

数据库表名字 必须 为「复数」，多个单词情况下使用「Snake Case」 如：photos, my_photos （注：目前由于和其他团队合作开发，所以这一条规范暂时不硬性要求）
数据库表迁移名字 必须 为「复数」，如：2014_08_08_234417_create_photos_table.php
数据填充文件名 必须 为「复数」，如：PhotosTableSeeder.php
数据库字段名 必须 为「Snake Case」，如：view_count, is_vip
数据库表主键 必须 为「id」（注：这条规范一定要严格执行，避免像018server的prouct表一样出现product_id这样的主键）
数据库表外键 必须 为「resource_id」，如：user_id, post_id
数据模型变量 必须 为「resource_id」，如：$user_id, $post_id



-------------php artisan list---------------

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
  clear-compiled        Remove the compiled class file
  down                  Put the application into maintenance mode
  env                   Display the current framework environment
  help                  Displays help for a command
  inspire               Display an inspiring quote
  list                  Lists commands
  migrate               Run the database migrations
  optimize              Optimize the framework for better performance (deprecated)
  preset                Swap the front-end scaffolding for the application
  serve                 Serve the application on the PHP development server
  tinker                Interact with your application
  up                    Bring the application out of maintenance mode
 app
  app:name              Set the application namespace
 auth
  auth:clear-resets     Flush expired password reset tokens
 cache
  cache:clear           Flush the application cache
  cache:forget          Remove an item from the cache
  cache:table           Create a migration for the cache database table
 config
  config:cache          Create a cache file for faster configuration loading
  config:clear          Remove the configuration cache file
 datatables
  datatables:make       Create a new DataTable service class.
  datatables:scope      Create a new DataTable Scope class.
 db
  db:seed               Seed the database with records
 debugbar
  debugbar:clear        Clear the Debugbar Storage
 event
  event:generate        Generate the missing events and listeners based on registration
 ide-helper
  ide-helper:eloquent   Add \Eloquent helper to \Eloquent\Model
  ide-helper:generate   Generate a new IDE Helper file.
  ide-helper:meta       Generate metadata for PhpStorm
  ide-helper:models     Generate autocompletion for models
 key
  key:generate          Set the application key
 make
  make:auth             Scaffold basic login and registration views and routes
  make:bindings         Add repository bindings to service provider.
  make:command          Create a new Artisan command
  make:controller       Create a new controller class
  make:criteria         Create a new criteria.
  make:entity           Create a new entity.
  make:event            Create a new event class
  make:exception        Create a new custom exception class
  make:factory          Create a new model factory
  make:job              Create a new job class
  make:listener         Create a new event listener class
  make:mail             Create a new email class
  make:middleware       Create a new middleware class
  make:migration        Create a new migration file
  make:model            Create a new Eloquent model class
  make:notification     Create a new notification class
  make:policy           Create a new policy class
  make:presenter        Create a new presenter.
  make:provider         Create a new service provider class
  make:repository       Create a new repository.
  make:request          Create a new form request class
  make:resource         Create a new resource
  make:rest-controller  Create a new RESTful controller.
  make:rule             Create a new validation rule
  make:seeder           Create a new seeder class
  make:test             Create a new test class
  make:transformer      Create a new Transformer Class
  make:validator        Create a new validator.
 migrate
  migrate:fresh         Drop all tables and re-run all migrations
  migrate:install       Create the migration repository
  migrate:refresh       Reset and re-run all migrations
  migrate:reset         Rollback all database migrations
  migrate:rollback      Rollback the last database migration
  migrate:status        Show the status of each migration
 notifications
  notifications:table   Create a migration for the notifications table
 package
  package:discover      Rebuild the cached package manifest
 queue
  queue:failed          List all of the failed queue jobs
  queue:failed-table    Create a migration for the failed queue jobs database table
  queue:flush           Flush all of the failed queue jobs
  queue:forget          Delete a failed queue job
  queue:listen          Listen to a given queue
  queue:restart         Restart queue worker daemons after their current job
  queue:retry           Retry a failed queue job
  queue:table           Create a migration for the queue jobs database table
  queue:work            Start processing jobs on the queue as a daemon
 route
  route:cache           Create a route cache file for faster route registration
  route:clear           Remove the route cache file
  route:list            List all registered routes
 schedule
  schedule:run          Run the scheduled commands
 session
  session:table         Create a migration for the session database table
 storage
  storage:link          Create a symbolic link from "public/storage" to "storage/app/public"
 vendor
  vendor:publish        Publish any publishable assets from vendor packages
 view
  view:clear            Clear all compiled view files



*/
