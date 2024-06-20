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
            $table->id(); // ID autoincremental para el pedido
            $table->dateTime('fecha'); // Fecha y hora del pedido
            $table->string('estado', 50); // Estado del pedido
            $table->foreignId('user_id')->constrained(); // Relación con la tabla users
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos'); // Eliminar la tabla pedidos si existe
    }
};
