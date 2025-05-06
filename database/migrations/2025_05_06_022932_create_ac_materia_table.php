<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ac_materia', function (Blueprint $table) {
            $table->id('mat_id');
            $table->unsignedBigInteger('mat_car_id');
            $table->foreign('mat_car_id')->references('car_id')->on('ac_carrera')->onDelete('cascade');
            $table->string('mat_nombre');
            $table->string('mat_descripcion')->nullable();

            $table->index('mat_car_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_materia');
    }
};
