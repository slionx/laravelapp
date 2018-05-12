<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<100;$i++){
            $tmp = [];
            $tmp['name'] = str_random(10);
            $tmp['email'] = str_random(8)."@qq.com";
            $tmp['password'] = Hash::make('123456');
            $tmp['avatar'] = "/uploads/avatar/default.png";
            $tmp['created_at'] = date("Y-m-d H:i:s");
            $tmp['updated_at'] = date("Y-m-d H:i:s");
            $arr[] = $tmp;
        }
        DB::table('users')->insert($arr);
    }
}
