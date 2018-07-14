<?php

use Illuminate\Database\Seeder;

class SystemSetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tmp[0]['name'] = 'global_comment_status';
        $tmp[0]['value'] = 'on';
        $tmp[0]['created_at'] = date("Y-m-d H:i:s");
        $tmp[0]['updated_at'] = date("Y-m-d H:i:s");
        DB::table('system_set')->insert($tmp);
    }
}
