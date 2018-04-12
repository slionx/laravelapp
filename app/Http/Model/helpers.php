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
				$newPermission = \App\Models\Permission::firstOrCreate([
					'slug' => $permission,
				],[
					'name' => $permission,
					'description' => $permission,
				]);
				$role = \App\Models\Role::where('slug', 'admin')->first();
				$role->attachPermission($newPermission);
				setUserPermissions($user);
				$check = true;
			}
		}
		return $check;
	}
}

