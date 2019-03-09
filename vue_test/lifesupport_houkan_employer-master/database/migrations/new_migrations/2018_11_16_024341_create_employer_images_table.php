<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('facility_id')->nullable();
            $table->unsignedInteger('employer_id');
            $table->timestamps();

            $table->foreign('facility_id')->references('id')->on('facilities')->onDelete('restrict');
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employer_images');
    }
}
