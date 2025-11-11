<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id('id_estudiante');
            $table->string('nombre', 100);
            $table->string('email', 100)->unique();
            $table->string('carrera', 50);
            $table->string('nrocelular', 20)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('estudiantes');
    }
};
