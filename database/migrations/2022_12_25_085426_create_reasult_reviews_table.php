<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReasultReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reasult_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('given_answer')->nullable();
            $table->boolean('is_correct')->default(0);
            $table->boolean('attempt')->default(0);
            $table->unsignedBigInteger('question_id')->nullable();
            $table->unsignedBigInteger('student_reasult_id')->nullable();
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
        Schema::dropIfExists('reasult_reviews');
    }
}
