<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('notices', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->default("");
                $table->string('content')->default("");
                //$table->string('content')->after('asd');

                $table->string('asd')->default("");

                $table->timestamps();
            });


            Schema::create('users_notices', function (Blueprint $table) {
                $table->integer('user_id')->unsigned();
                $table->integer('notice_id')->unsigned();
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
                $table->foreign('notice_id')
                    ->references('id')
                    ->on('notices')
                    ->onDelete('cascade');
                $table->primary(['user_id', 'notice_id']);
            });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('notice')) {
            Schema::dropIfExists('notice');
        }
        if (Schema::hasTable('users_notices')) {
            Schema::dropIfExists('users_notices');
        }
    }
}
