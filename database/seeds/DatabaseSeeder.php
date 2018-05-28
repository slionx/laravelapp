<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*	    factory('App\Http\Model\User', 50)->create()->each(function($u) {
		    $u->posts()->save(factory('App\Http\Model\Post')->make());
	    });*/
        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(PostsTableSeeder::class);
    }
}
