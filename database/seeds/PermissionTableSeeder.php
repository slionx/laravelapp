<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tmp[10]['name'] = 'post.index';
        $tmp[10]['display_name'] = '文章管理';
        $tmp[10]['description'] = '文章管理';

        $tmp[11]['name'] = 'post.create';
        $tmp[11]['display_name'] = '文章管理-添加';
        $tmp[11]['description'] = '添加文章';

        $tmp[12]['name'] = 'post.update';
        $tmp[12]['display_name'] = '文章管理-修改';
        $tmp[12]['description'] = '修改文章';

        $tmp[13]['name'] = 'post.delete';
        $tmp[13]['display_name'] = '文章管理-删除';
        $tmp[13]['description'] = '删除文章';

        $tmp[20]['name'] = 'user.index';
        $tmp[20]['display_name'] = '用户管理';
        $tmp[20]['description'] = '用户管理';

        $tmp[21]['name'] = 'user.create';
        $tmp[21]['display_name'] = '用户管理-添加';
        $tmp[21]['description'] = '添加用户';

        $tmp[22]['name'] = 'user.update';
        $tmp[22]['display_name'] = '用户管理-修改';
        $tmp[22]['description'] = '修改用户信息';

        $tmp[23]['name'] = 'user.delete';
        $tmp[23]['display_name'] = '用户管理-删除';
        $tmp[23]['description'] = '删除用户';

        $tmp[30]['name'] = 'role.index';
        $tmp[30]['display_name'] = '角色管理';
        $tmp[30]['description'] = '角色管理';

        $tmp[31]['name'] = 'role.create';
        $tmp[31]['display_name'] = '角色管理-添加';
        $tmp[31]['description'] = '添加角色';

        $tmp[32]['name'] = 'role.update';
        $tmp[32]['display_name'] = '角色管理-修改';
        $tmp[32]['description'] = '修改角色';

        $tmp[33]['name'] = 'role.delete';
        $tmp[33]['display_name'] = '角色管理-删除';
        $tmp[33]['description'] = '删除角色';

        $tmp[40]['name'] = 'permission.index';
        $tmp[40]['display_name'] = '权限管理';
        $tmp[40]['description'] = '权限管理';

        $tmp[41]['name'] = 'permission.create';
        $tmp[41]['display_name'] = '权限管理-添加';
        $tmp[41]['description'] = '添加权限';

        $tmp[42]['name'] = 'permission.update';
        $tmp[42]['display_name'] = '权限管理-修改';
        $tmp[42]['description'] = '修改权限';

        $tmp[43]['name'] = 'permission.delete';
        $tmp[43]['display_name'] = '权限管理-删除';
        $tmp[43]['description'] = '删除权限';


        $tmp[100]['name'] = 'admin.login';
        $tmp[100]['display_name'] = '后台登录权限';
        $tmp[100]['description'] = '后台登录权限';

        DB::table('permissions')->insert($tmp);


        $total = \App\Http\Model\permission::count('id');

        for($i=1;$i<$total+1;$i++){
            $tmp = ['permission_id'=>$i,'role_id'=>1];
            $arr[] = $tmp;
        }
        DB::table('permission_role')->insert($arr);
    }
}
