<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
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
            $tmp['name'] = str_random(6);
            $tmp['count'] = rand(0,100);
            $tmp['created_at'] = date("Y-m-d H:i:s");
            $tmp['updated_at'] = date("Y-m-d H:i:s");
            $arr[] = $tmp;
        }
        DB::table('tags')->insert($arr);

        for($i=1;$i<1001;$i++){
            $tmp_ = [];
            $tmp_['post_id'] = $i;
            $tmp_['tag_id'] = rand(1,10);
            $arr_[] = $tmp_;
        }

        DB::table('post_tag')->insert($arr_);
    }
}
