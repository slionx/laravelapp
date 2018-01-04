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



	 function getModalShowActionButtion( $id ) {
		if ( haspermission( $this->module . 'controller.show' ) ) {
			return '<a href="' . route( $this->module . '.show', [ encodeId( $id, $this->module ) ] ) . '" class="btn btn-xs btn-info tooltips" data-toggle="modal" data-target="#myModal" data-original-title="' . trans( 'common.show' ) . '"  data-placement="top"><i class="fa fa-eye"></i></a> ';
		}

		return '';
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

