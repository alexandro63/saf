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

    //     Schema::create('ac_alumno', function (Blueprint $table) {
    //         $table->increments('alu_id');
    //         $table->unsignedInteger('alu_car_file');
    //         $table->unsignedInteger('alu_per_id');
    //         $table->foreign('alu_per_id')->references('per_id')->on('gr_persona');
    //         $table->unsignedInteger('alu_car_id');
    //         $table->foreign('alu_car_id')->references('car_id')->on('ac_carrera');
    //         $table->integer('alu_reg_matr');
    //         $table->integer('alu_mensualidad');
    //         $table->date('alu_fec_ing');
    //         $table->date('alu_fech_pago');
    //         $table->string('alu_turno', 20);
    //         $table->string('alu_curso', 20);
    //         $table->tinyInteger('alu_eliminado');
    //         $table->text('alu_obs')->nullable();
    //         $table->tinyInteger('alu_estado')->default(1);
    //         $table->tinyInteger('alu_con_car');
    //         $table->integer('alu_num_men');
    //         $table->tinyInteger('alu_matr_can');
    //         $table->integer('alu_matr_pag');
    //         $table->string('alu_obs_pago');
    //         $table->timestamps();
    //     });

    //     Schema::enableForeignKeyConstraints();
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('ac_alumno');
    // }
};
