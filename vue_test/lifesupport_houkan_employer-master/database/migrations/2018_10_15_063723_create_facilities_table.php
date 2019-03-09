<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->unSignedInteger('employer_id');
            $table->unSignedInteger('facility_type_id');
            $table->text('photos')->nullable();
            $table->tinyInteger('work_environment_checked')->nullable();
            $table->string('question_1')->nullable();
            $table->string('question_2')->nullable();
            $table->string('question_3')->nullable();
            $table->string('question_4')->nullable();
            $table->string('question_5')->nullable();
            $table->string('question_6')->nullable();
            $table->text('service_types')->nullable();
            $table->string('name')->nullable();
            $table->string('name_kana')->nullable();
            $table->date('established_date')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('prefecture')->nullable();
            $table->string('city')->nullable();
            $table->string('street_address')->nullable();
            $table->string('building')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('access')->nullable();
            $table->interger('created_at')->nullable();
            $table->interger('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facilities');
    }
}
