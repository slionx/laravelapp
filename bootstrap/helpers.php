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
