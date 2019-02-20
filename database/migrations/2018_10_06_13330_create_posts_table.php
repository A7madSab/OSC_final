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
            //$table->engine = 'InnoDB';
            $table->increments('post_id');
            $table->string ('auther');
            $table->string ('title');
            $table->mediumText ('body');
            $table->integer('User_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('comment_count')->unsigned();
            $table->string ('image');
            $table->timestamps();

            
            $table->foreign('category_id')
                    ->references('category_id')
                    ->on('categories')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            
            $table->foreign('User_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        //$table->dropForeign('posts_user_id_foreign');
    }
}
