<?php


/**
 * 返回可读性更好的文件尺寸
 */
function human_filesize( $bytes, $decimals = 2 ) {
    $size   = [ 'B', 'kB', 'MB', 'GB', 'TB', 'PB' ];
    $factor = floor( ( strlen( $bytes ) - 1 ) / 3 );

    return sprintf( "%.{$decimals}f", $bytes / pow( 1024, $factor ) ) . @$size[ $factor ];
}

/**
 * 判断文件的MIME类型是否为图片
 */
function is_image( $mimeType ) {
    return starts_with( $mimeType, 'image/' );
}



function getEditActionButton($id,$module)
{

    $url = route($module.'.edit', $id);
    $edit = trans('common.edit');
    return <<<Eof
		<a href="{$url}" title="{$edit}" class="btn btn-sm yellow-gold btn-outline filter-submit margin-bottom">
                             <i class="fa fa-edit"></i></a>
Eof;

}

function getDestroyActionButton($id,$module)
{

    $url = route($module.'.destroy', $id);
    $delete = trans('common.delete');
    $csrfToken = csrf_field();
    $method = method_field('delete');
    return <<<Eof
		<a href="javascript:;" class="btn btn-sm red btn-outline filter-cancel destroy_item" title="{$delete}" onclick="return false;">
                             <i class="fa fa-trash"></i>
		<form action="{$url}" method="POST" style="display:none">
						$method
						$csrfToken
					</form>
 		</a>
Eof;

}

function getActionButtonAttribute($id,$module)
{
    return getEditActionButton($id,$module)
    .getDestroyActionButton($id,$module);
}


if(! function_exists('haspermission') ) {
    function haspermission($permission)
    {
        $check = false;
        if (auth()->check()) {
            $user = auth()->user();
            $userPermissions =  getCurrentPermission($user);
            $check = in_array($permission, (array)$userPermissions['permissions']);
            if (in_array('admin', (array)$userPermissions['roles']) && !$check) {
                //dd($permission);
                $newPermission = \App\Http\Model\permission::firstOrCreate([
                    'slug' => $permission,
                ],[
                    'name' => "自动生成权限".$permission,
                    'description' => "自动生成权限".$permission,
                ]);
                $role = \App\Http\Model\Role::where('name', 'admin')->first();
                $role->attachPermission($newPermission);
                setUserPermissions($user);
                $check = true;
            }
        }
        return $check;
    }
}

/**
 * 获取当前用户权限、角色
 */
if(!function_exists('getCurrentPermission')){
    function getCurrentPermission($user)
    {
        $key = 'user_'.$user->id;
        if (cache()->has($key)) {
            return cache($key);
        }
        setUserPermissions($user);
        return cache($key);
    }
}
/**
 * 刷新当前用户权限、角色
 */
if(!function_exists('refreshCurrentPermission')){
    function refreshCurrentPermission($user)
    {
        $key = 'user_'.$user->id;
        cache()->forget($key);
        setUserPermissions($user);
    }
}

/**
 * 设置用户权限、角色
 */
if(!function_exists('setUserPermissions')){
    function setUserPermissions($user)
    {
        //查出角色对应的所有权限
        $Permissions = [];
        $roles = $user->roles()->get();
        if(count($roles) > 0){
            foreach ( $roles as $role ) {
                $allRoles[] = $role->slug;
                $tmp = \App\Http\Model\Role::find($role->id)->getPermission();
                foreach ( $tmp as $v ) {
                    $Permissions[] = $v->slug;
                }
            }
        }else{
            return $Permissions = [];
        }
        $Permissions = array_unique($Permissions);
        $allPermissions = \App\Http\Model\permission::all()->pluck('slug')->all();
        cache()->forever('user_'.$user->id, [
            'permissions' => $Permissions,
            'roles' => $allRoles,
            'allPermissions' => $allPermissions
        ]);
    }
}
/**
 * 清空缓存
 */
if(!function_exists('cacheClear')){
    function cacheClear()
    {
        cache()->flush();
    }
}


function getList()
{
    $menu_list = [
        [
            'name' => '仪表盘',
            'route' => 'dashboard.index',
            'icon' => 'fa fa-dashboard',
            'list' => [
                [
                    'name' => '仪表盘',
                    'route' => 'dashboard.index',
                    'icon' => 'icon-bar-chart',
                ],
            ],
        ],
        [
            'name' => '文章管理',
            'route' => 'post.index',
            'icon' => 'icon-docs',
            'list' => [
                [
                    'name' => '文章列表',
                    'route' => 'post.index',
                    'icon' => 'icon-docs',
                    'sub' => [
                        'post.index',
                    ],
                ],
                [
                    'name' => '添加文章',
                    'route' => 'post.create',
                    'icon' => 'icon-note',
                    'sub' => [
                        'post.create',
                    ],
                ],
                [
                    'name' => '分类列表',
                    'route' => 'category.index',
                    'icon' => 'fa fa-navicon',
                    'sub' => [
                        'post.create',
                    ],
                ],
                [
                    'name' => '添加分类',
                    'route' => 'category.create',
                    'icon' => 'fa fa-navicon',
                    'sub' => [
                        'post.create',
                    ],
                ],
                [
                    'name' => '标签列表',
                    'route' => 'tag.index',
                    'icon' => 'fa fa-navicon',
                    'sub' => [
                        'post.create',
                    ],
                ],
                [
                    'name' => '添加标签',
                    'route' => 'tag.create',
                    'icon' => 'fa fa-navicon',
                    'sub' => [
                        'post.create',
                    ],
                ],
            ],
        ],
        [
            'name' => '用户管理',
            'route' => 'user.index',
            'icon' => 'icon-users',
            'list' => [
                [
                    'name' => '用户列表',
                    'route' => 'user.index',
                    'icon' => 'icon-user',
                ],
                [
                    'name' => '添加用户',
                    'route' => 'user.create',
                    'icon' => 'icon-user',
                ],
                [
                    'name' => '角色列表',
                    'route' => 'role.index',
                    'icon' => 'icon-bar-chart',
                ],
                [
                    'name' => '添加角色',
                    'route' => 'role.create',
                    'icon' => 'icon-bar-chart',
                ],
                [
                    'name' => '权限列表',
                    'route' => 'permission.index',
                    'icon' => 'icon-bar-chart',
                ],
                [
                    'name' => '添加权限',
                    'route' => 'permission.create',
                    'icon' => 'icon-bar-chart',
                ],
            ],
        ],
        [
            'name' => '欢迎页管理',
            'route' => 'welcome.index',
            'icon' => 'icon-home',
            'list' => [
                [
                    'name' => '欢迎页列表',
                    'route' => 'welcome.index',
                    'icon' => 'icon-home',
                ],
            ],
        ],
        [
            'name' => '系统设置',
            'route' => 'welcome.index',
            'icon' => 'fa fa-cogs',
            'list' => [
                [
                    'name' => '系统设置',
                    'route' => 'welcome.index',
                    'icon' => 'fa fa-cogs',
                ],
            ],
        ],
    ];

   /* $menu_list = $this->resetList($menu_list);
    foreach ($menu_list as $i => $item) {
        if (is_array($item['list']) && count($item['list']) == 0) {
            unset($menu_list[$i]);
            continue;
        }
        if (is_array($item['list'])) {
            $menu_list[$i]['route'] = $item['list'][0]['route'];
        }
    }
    $menu_list = array_values($menu_list);*/
    return $menu_list;
}

function menuList(){
    $menuList = getList();
    $route = substr(Request::path(),6);
    if(strpos($route,'/') ===false){
        $route = $route."/index";
    }
    $route = str_replace('/','.',$route);

    $menu ='';
    foreach ($menuList as $item) {
        $menu .= '<li class="nav-item '. activeMenu($item,$route) .'">';
        $menu .= '<a href="'. route($item['route']) .'" class="nav-link nav-toggle">';
        $menu .= '<i class="'. $item['icon'] .'"></i>';
        $menu .= '<span class="title">'. $item['name'] .'</span>';
        $menu .= '<span class="arrow"></span>';
        $menu .= '</a>';
        if(isset($item['list']) && is_array($item['list'])){
            $menu .= '<ul class="sub-menu">';
            foreach ($item['list'] as $sub_item) {
                $menu .= '<li class="nav-item '. activeMenu($sub_item,$route) .'">';
                $menu .= ' <a href="'. route($sub_item['route']) .'" class="nav-link ">';
                $menu .= '<span class="title">'. $sub_item['name'] .'</span>';
                $menu .= '</a>';
                $menu .= '</li>';
            }
            $menu .= '</ul>';
        }
        $menu .= '</li>';
    }
    return $menu;
}

function activeMenu($item, $route)
{
    if (isset($item['route']) && ($item['route'] == $route ))
        return 'active open';
    if (isset($item['list']) && is_array($item['list'])) {
        foreach ($item['list'] as $sub_item) {
            $active = activeMenu($sub_item, $route);
            if ($active != '')
                return $active;
        }
    }
    return '';
}

function resetList($list)
{
    foreach ($list as $i => $item) {
        if (isset($item['id']) && $this->user_auth !== null && !in_array($item['id'], $this->user_auth)) {
            unset($list[$i]);
            continue;
        }
        if (isset($item['list']) && is_array($item['list'])) {
            $list[$i]['list'] = $this->resetList($item['list']);
        }
    }
    $list = array_values($list);
    return $list;
}
