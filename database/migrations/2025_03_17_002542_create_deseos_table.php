<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deseos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->string('nombre');
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->unsignedBigInteger('estado_id')->default(1);
            $table->timestamp('fecha_creacion')->useCurrent();

            // Claves foráneas
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deseos');
    }
};
