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
        Schema::create('informe_practica', function (Blueprint $table) {
            $table->bigIncrements('id_informe');
            $table->unsignedBigInteger('id_estudiante')->index('informe_practica_id_estudiante_foreign');
            $table->unsignedBigInteger('id_oferta')->index('informe_practica_id_oferta_foreign');
            $table->date('fecha_entrega')->nullable();
            $table->decimal('calificacion', 5)->nullable();
            $table->text('comentarios')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informe_practica');
    }
};
