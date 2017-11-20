<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('name')->unique();
	        $table->string('email')->unique();
	        $table->string('password');
	        $table->smallInteger('is_active')->default(0);
	        $table->string('confirmation_token');
	        $table->string('avatar')->nullable();
	        $table->string('comments')->default();
	        //$table->json('setting');
	        $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}