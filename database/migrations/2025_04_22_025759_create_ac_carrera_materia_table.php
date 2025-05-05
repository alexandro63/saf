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

    //     Schema::create('ac_carrera_materia', function (Blueprint $table) {
    //         $table->increments('cma_id');
    //         $table->unsignedInteger('cma_mat_id');
    //         $table->foreign('cma_mat_id')->references('mat_id')->on('ac_materia');
    //         $table->unsignedInteger('cma_car_id');
    //         $table->foreign('cma_car_id')->references('car_id')->on('ac_carrera');
    //         $table->unsignedInteger('cma_gpe_id');
    //         $table->date('cma_fecha_ini');
    //         $table->date('cma_fecha_fin');
    //         $table->tinyInteger('cma_eliminado');
    //     });

    //     Schema::enableForeignKeyConstraints();
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('ac_carrera_materia');
    // }
};
