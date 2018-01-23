<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_author')->default('');
            $table->string('post_title');
            $table->string('post_slug')->default('');
            $table->longText('post_content');
            $table->string('post_status')->default('')->comment('文章状态 publish/auto-draft/inherit等');
            $table->string('post_category')->default('');
            $table->string('post_tag')->default('');
            $table->string('post_image')->default('');
            $table->string('post_password')->default('');
            $table->string('post_sort')->default(255);
            $table->string('comments_status')->default(1);
            $table->string('comments_count')->default(0);
	        $table->string('followers_count')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
