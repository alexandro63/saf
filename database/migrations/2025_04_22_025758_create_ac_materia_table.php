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

    //     Schema::create('ac_materia', function (Blueprint $table) {
    //         $table->increments('mat_id');
    //         $table->string('mat_nombre', 250);
    //         $table->unsignedInteger('mat_car_id');
    //         $table->foreign('mat_car_id')->references('car_id')->on('ac_carrera');
    //         $table->string('mat_sigla', 50);
    //         $table->integer('mat_horasacad');
    //         $table->string('mat_descripcion', 50);
    //         $table->text('mat_obs');
    //         $table->string('mat_codigo', 50);
    //         $table->string('mat_codint', 50);
    //     });

    //     Schema::enableForeignKeyConstraints();
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('ac_materia');
    // }
};
