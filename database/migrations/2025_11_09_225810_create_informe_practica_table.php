<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('informe_practica', function (Blueprint $table) {
            $table->id('id_informe');

            $table->unsignedBigInteger('id_estudiante');
            $table->unsignedBigInteger('id_oferta');

            $table->date('fecha_entrega')->nullable();
            $table->decimal('calificacion', 3, 2)->nullable();
            $table->text('comentarios')->nullable();

            $table->timestamps();

            // Foreign keys
            $table->foreign('id_estudiante')
                ->references('id_estudiante')
                ->on('estudiantes')
                ->onDelete('cascade');

            $table->foreign('id_oferta')
                ->references('id_oferta')
                ->on('ofertas')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('informe_practica');
    }
};
