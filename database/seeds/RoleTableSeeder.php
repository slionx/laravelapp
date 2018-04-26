<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            $tmp = [];
            $tmp['name'] = 'admin';
            $tmp['slug'] = 'admin';
            $tmp['created_at'] = date("Y-m-d H:i:s");
            $tmp['updated_at'] = date("Y-m-d H:i:s");
            $arr[] = $tmp;
        DB::table('roles')->insert($arr);
        DB::table('role_user')->insert(['user_id'=>1,'role_id'=>1]);
    }
}
