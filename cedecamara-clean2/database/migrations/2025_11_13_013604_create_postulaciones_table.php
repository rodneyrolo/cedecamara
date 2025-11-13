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
        Schema::create('postulaciones', function (Blueprint $table) {
            $table->bigIncrements('id_postulacion');
            $table->unsignedBigInteger('id_estudiante')->index('postulaciones_id_estudiante_foreign');
            $table->unsignedBigInteger('id_oferta')->index('postulaciones_id_oferta_foreign');
            $table->date('fecha_postulacion');
            $table->string('estado', 20);
            $table->text('comentario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulaciones');
    }
};
