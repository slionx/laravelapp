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

php artisan storage:link

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
