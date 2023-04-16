<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('illnesses_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('illness_id');
            $table->unsignedBigInteger('animal_id');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->timestamps();
            $table->foreign('illness_id')->references('id')->on('illnesses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('illnesses_details');
    }
};
