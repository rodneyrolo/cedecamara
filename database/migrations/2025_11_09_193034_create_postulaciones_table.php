<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('postulaciones', function (Blueprint $table) {
            $table->id('id_postulacion');
            $table->foreignId('id_estudiante')->constrained('estudiantes', 'id_estudiante')->onDelete('cascade');
            $table->foreignId('id_oferta')->constrained('oferta_practicantes', 'id_oferta')->onDelete('cascade');
            $table->date('fecha_postulacion');
            $table->string('estado', 20);
            $table->text('comentario')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('postulaciones');
    }
};
