<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0;$i<100;$i++){
            $tmp = [];
            $tmp['name'] = str_random(10);
            $tmp['email'] = str_random(8)."qq.com";
            $tmp['password'] = \Illuminate\Support\Facades\Hash::make('123456');
            $tmp['avatar'] = "/uploads/avatar/20180426/1524729770641315.jpeg";
            $tmp['created_at'] = date("Y-m-d H:i:s");
            $tmp['updated_at'] = date("Y-m-d H:i:s");
            $arr[] = $tmp;
        }
        DB::table('users')->insert($arr);
    }
}
