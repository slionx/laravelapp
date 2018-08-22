<?php
/**
 * Created by PhpStorm.
 * User: Slionx
 * Date: 2018/1/16
 * Time: 14:00
 */

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Cache;


class MenuRepository extends BaseRepository {

	public function model() {
		return "App\\Http\\Model\\Menu";
	}

    public function getMenuList()
    {
        $menu = MenuRepository::orderBy('weights','desc')->findWhere(['status'=>1])->toarray();

        $result = $this->sortMenuSetCache($menu);

        return $result;
	}

    public function sortMenuSetCache($menus)
    {

        if ($menus) {
            $menuList = $this->sortMenu($menus);
            foreach ($menuList as $key => $value) {
                if ($value['child']) {
                    $sort = array_column($value['child'], 'weights');
                    array_multisort($sort,SORT_DESC,$value['child']);
                }
            }
            //缓存菜单数据
            Cache::forever(config('admin.globals.cache.menuList'), $menuList);
            return $menuList;
        }
        return '';
    }

    /*
      * 递归调用菜单数据
      */
    public function sortMenu($menus,$pid=0)
    {
        $arr = [];
        if (empty($menus)) {
            return '';
        }
        foreach ($menus as $key => $value) {
            if ($value['pid'] == $pid) {
                $arr[$key] = $value;
                $arr[$key]['child'] = self::sortMenu($menus,$value['id']);
            }
        }
        return $arr;
    }

}