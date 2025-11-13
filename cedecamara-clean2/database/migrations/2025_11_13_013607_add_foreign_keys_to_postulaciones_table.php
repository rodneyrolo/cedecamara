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
        Schema::table('postulaciones', function (Blueprint $table) {
            $table->foreign(['id_estudiante'])->references(['id_estudiante'])->on('estudiantes')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['id_oferta'])->references(['id_oferta'])->on('ofertas')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('postulaciones', function (Blueprint $table) {
            $table->dropForeign('postulaciones_id_estudiante_foreign');
            $table->dropForeign('postulaciones_id_oferta_foreign');
        });
    }
};
