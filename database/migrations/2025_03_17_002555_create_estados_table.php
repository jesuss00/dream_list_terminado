<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique(); // Nombre del estado (Pendiente, Realizado)
        });

        // Insertar valores por defecto
        DB::table('estados')->insert([
            ['id' => 1, 'nombre' => 'Pendiente'],
            ['id' => 2, 'nombre' => 'Realizado']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estados');
    }
};
