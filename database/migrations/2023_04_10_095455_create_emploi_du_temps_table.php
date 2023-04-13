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
        Schema::create('emploi_du_temps', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_salle');
            $table->foreign('id_salle')->references('id')->on('salles');

            $table->unsignedBigInteger('id_prof');
            $table->foreign('id_prof')->references('id')->on('professeurs');

            $table->unsignedBigInteger('id_classe');
            $table->foreign('id_classe')->references('id')->on('classes');

            $table->string('cours', 100);

            $table->date('date');
            $table->time('start');
            $table->time('end');

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
        Schema::dropIfExists('emploi_du_temps');
    }
};
