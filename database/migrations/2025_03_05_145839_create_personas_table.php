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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 40);
            $table->string('apellido', 20);
            // $table->string('apellido_materno', 20);
            $table->string('direccion_domicilio', 100);
            // $table->string('dni')->unique();
            // $table->string('digito_verificador');
            $table->string('telefono');
            $table->char('estado', 1)->default('1');
            $table->integer('usuario_crea')
                ->nullable();
            $table->integer('usuario_modifica')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
