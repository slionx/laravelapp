<?php

use Illuminate\Database\Seeder;
use App\Http\Model\Posts;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    factory('App\Http\Model\User', 50)->create()->each(function($u) {
		    $u->posts()->save(factory('App\Http\Model\Post')->make());
	    });
          //$this->call(UsersTableSeeder::class);
           /*DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);*/
    }
}
