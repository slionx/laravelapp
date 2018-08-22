<?php
/*use Illuminate\Support\Facades\Cache;

Cache::forever('backend_global_set.global_comment_status',false);
*/





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
		<a href="{$url}" title="{$edit}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill">
                             <i class="la la-edit"></i></a>
Eof;

}

function getDestroyActionButton($id,$module)
{

    $url = route($module.'.destroy', $id);
    $delete = trans('common.delete');
    $csrfToken = csrf_field();
    $method = method_field('delete');
    return <<<Eof
		<a href="javascript:;" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill destroy_item" title="{$delete}" onclick="return false;">
                             <i class="fa fa-trash"></i>
		<form action="{$url}" method="POST" style="display:none">
						$method
						$csrfToken
					</form>
 		</a>
Eof;

}

function getViewActionButton($name,$parm)
{
    $url = route($name, $parm);
    return "<a target='_blank' href=\"{$url}\" title=\"查看\" class=\"m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill\"><i class=\"fa fa-eye\"></i></a>";

}

function getActionButtonAttribute($id,$module)
{
    return getEditActionButton($id,$module)
        .getDestroyActionButton($id,$module);
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

/**
 * 获取客户端IP地址
 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
 * @return mixed
 */
function get_client_ip($type = 0) {
    $type       =  $type ? 1 : 0;
    static $ip  =   NULL;
    if ($ip !== NULL) return $ip[$type];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $pos    =   array_search('unknown',$arr);
        if(false !== $pos) unset($arr[$pos]);
        $ip     =   trim($arr[0]);
    }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip     =   $_SERVER['HTTP_CLIENT_IP'];
    }elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip     =   $_SERVER['REMOTE_ADDR'];
    }
    // IP地址合法验证
    $long = sprintf("%u",ip2long($ip));
    $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
    return $ip[$type];
}

