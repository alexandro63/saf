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
        Schema::create('gr_persona', function (Blueprint $table) {
            $table->id('per_id');
            $table->string('per_nombres');
            $table->string('per_apellidopat')->nullable();
            $table->string('per_apellidomat')->nullable();
            $table->string('per_ci', 15);
            $table->dateTime('per_fechaing')->nullable();
            $table->string('per_sangre', 10)->nullable();
            $table->string('per_nacionalidad', 100)->nullable();
            $table->string('per_direccion', 100)->nullable();
            $table->string('per_telefono', 15)->nullable();
            $table->string('per_email', 100)->nullable();
            $table->date('per_fechanac')->nullable();
            $table->string('per_celular', 15)->nullable();
            $table->string('per_ecivil', 15)->nullable();
            $table->string('per_emergencia', 100)->nullable();
            $table->string('per_diremergencia', 100)->nullable();
            $table->string('per_telemergencia', 15)->nullable();
            $table->string('per_tdi_id')->nullable();
            $table->string('per_ndoc', 20)->nullable();
            $table->string('per_email2', 100)->nullable();
            $table->string('per_pagweb', 100)->nullable();
            $table->string('per_nac_id')->nullable();
            $table->string('per_pathfoto', 200)->nullable();
            $table->char('per_genero', 1)->nullable();
            $table->string('per_lugarnac')->nullable();
            $table->string('per_ec_id')->nullable();
            $table->string('per_pai_id', 20)->nullable();
            $table->string('per_zona', 50)->nullable();
            $table->string('per_barrio', 60)->nullable();
            $table->string('per_datos_adicionales', 100)->nullable();
            $table->string('per_ci_proced', 20)->nullable();
            $table->tinyInteger('per_estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gr_persona');
    }
};
