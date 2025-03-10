<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->longText('post_title')->nullable();
            $table->longText('post_content')->nullable();
            $table->longText('post_export')->nullable();
            $table->longText('post_image')->nullable();
            $table->longText('post_tags')->nullable();
            $table->longText('post_keywords')->nullable();
            $table->string('post_author')->nullable();
            $table->integer('post_view')->default(0);
            $table->integer('post_share')->default(0);
            $table->longText('post_status')->default('active');
            $table->longText('post_slug')->unique();
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
