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
        Schema::create('ofertas', function (Blueprint $table) {
            $table->bigIncrements('id_oferta');
            $table->unsignedBigInteger('id_empresa')->index('oferta_practicantes_id_empresa_foreign');
            $table->string('titulo', 100);
            $table->text('descripcion')->nullable();
            $table->string('modalidad', 100);
            $table->date('fecha_publicacion')->nullable();
            $table->string('estado', 20)->default('abierta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertas');
    }
};
