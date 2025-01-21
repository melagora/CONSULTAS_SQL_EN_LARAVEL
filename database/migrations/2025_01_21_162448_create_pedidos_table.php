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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('producto');
            $table->integer('cantidad');
            $table->decimal('total', 8, 2);
            $table->foreignId('id_usuario')->constrained('usuarios')->onDelete('cascade'); // Relación con usuarios
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};

// Melvin Alexander González Ramos
// k00002522
