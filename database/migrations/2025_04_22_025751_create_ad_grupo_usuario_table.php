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

        Schema::create('ad_grupo_usuario', function (Blueprint $table) {
            $table->id('gus_id');
            $table->unsignedBigInteger('gus_usu_id');
            $table->foreign('gus_usu_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('gus_gru_id');
            $table->foreign('gus_gru_id')->references('gru_id')->on('ad_grupo')->onDelete('cascade');
            $table->index('gus_usu_id');
            $table->index('gus_gru_id');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_grupo_usuario');
    }
};
