<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoiceOfStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voice_of_staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('job_category_id');
            $table->string('role');
            $table->string('years_of_exp');
            $table->string('image')->nullable();
            $table->string('question_1');
            $table->text('answer_1');
            $table->string('question_2')->nullable();
            $table->text('answer_2')->nullable();
            $table->string('question_3')->nullable();
            $table->text('answer_3')->nullable();
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
        Schema::dropIfExists('voice_of_staffs');
    }
}
