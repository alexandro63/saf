<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::disableForeignKeyConstraints();

    //     Schema::create('ac_alumno_carrera', function (Blueprint $table) {
    //         $table->increments('alucar_id');
    //         $table->unsignedInteger('alucar_alu_id');
    //         $table->foreign('alucar_alu_id')->references('alu_id')->on('ac_alumno');
    //         $table->unsignedInteger('alucar_car_id');
    //         $table->foreign('alucar_car_id')->references('car_id')->on('ac_carrera');
    //         $table->string('alucar_mig', 30);
    //         $table->string('alucar_obs', 30);
    //         $table->tinyInteger('alucar_eli');
    //     });

    //     Schema::enableForeignKeyConstraints();
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('ac_alumno_carrera');
    // }
};
