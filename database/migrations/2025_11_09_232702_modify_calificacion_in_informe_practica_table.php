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
    Schema::table('informe_practica', function (Blueprint $table) {
        $table->decimal('calificacion', 5, 2)->nullable()->change();
    });
}

public function down(): void
{
    Schema::table('informe_practica', function (Blueprint $table) {
        $table->decimal('calificacion', 3, 2)->nullable()->change();
    });
}
};
