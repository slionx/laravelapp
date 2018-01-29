<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CategoryService;

/**
 * Class CategoryServiceProvider
 * @package App\Providers
 * 缓载服务提供者
 */
class CategoryServiceProvider extends ServiceProvider
{


	/**
	 * @var bool
	 * 缓载服务提供者 需设置 $defer = true
	 */
	protected $defer = true;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
	    //使用singleton绑定单例
	    /*$this->app->singleton('Category',function(){
		    return new CategoryRepository();
	    });*/

	    //使用bind绑定实例到接口以便依赖注入
	    $this->app->bind('App\Contracts\CategoryInterface','App\Repositories\CategoryRepository');
    }

	/**
	 * @return array
	 * 返回缓载服务提供者所绑定服务的名称
	 */
	public function provides(  ) {
    	return ['App\Contracts\CategoryInterface'];
    }
}
