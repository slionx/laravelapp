<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
            $tmp = [];
            $tmp['name'] = str_random(10);
            $tmp['count'] = rand(0,100);
            $tmp['sort'] = rand(0,255);
            $tmp['created_at'] = date("Y-m-d H:i:s");
            $tmp['updated_at'] = date("Y-m-d H:i:s");
            $arr[] = $tmp;
        }
        DB::table('category')->insert($arr);
    }
}
