<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<1000;$i++){
            $tmp = [];
            $tmp['post_author'] = 1;
            $tmp['post_title'] = str_random(15);
            $tmp['post_slug'] = str_random(15)."-slug";
            $tmp['post_content'] = "post_content-".str_random(150);
            $tmp['post_category'] = rand(1,10);
            $tmp['comments_count'] = rand(0,1000);
            $tmp['followers_count'] = rand(0,1000);
            $tmp['created_at'] = date("Y-m-d H:i:s");
            $tmp['updated_at'] = date("Y-m-d H:i:s");
            $arr[] = $tmp;
        }
        DB::table('posts')->insert($arr);
    }
}
