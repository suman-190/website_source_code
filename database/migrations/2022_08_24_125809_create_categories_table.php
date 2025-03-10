<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('sn')->default(0);
            $table->string('name');
            $table->boolean('is_parent')->default(1);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('image')->nullable();
            $table->string('totalyear')->nullable();
            $table->longText('description')->nullable();
            $table->string('status')->default('active');
            $table->string('slag')->unique();
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('SET NULL');
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
        Schema::dropIfExists('categories');
    }
}
