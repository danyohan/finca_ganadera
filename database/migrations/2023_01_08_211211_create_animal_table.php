<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->unsignedBigInteger('race_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('paddock_id');
            $table->unsignedBigInteger('animal_type_id');
            $table->date('birth_date')->nullable();;
            $table->date('death_date')->nullable();;
            $table->string('age')->nullable();
            $table->string('slug', 300)->nullable();
            $table->decimal('weight');
            $table->unsignedBigInteger('status_id');
            $table->string('image', 300)->nullable();
            $table->string('path', 300)->nullable();
            $table->timestamps();

            $table->foreign('race_id')->references('id')->on('races')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('paddock_id')->references('id')->on('paddocks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('animal_type_id')->references('id')->on('animal_types')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
