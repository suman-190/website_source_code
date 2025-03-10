<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->integer('sn')->default(0);
            $table->string('url')->nullable();
            $table->string('image_id')->nullable();
            $table->integer('clickcount')->default(0);
            $table->integer('viewcount')->default(0);
            $table->unsignedBigInteger('adsposition_id')->nullable();
            $table->foreign('adsposition_id')->references('id')->on('adspositions')->onDelete('cascade');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('ads');
    }
}
