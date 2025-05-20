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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('icono', 50)->nullable();
            $table->string('descripcion', 100)->nullable();
            $table->string('url', 200)->nullable();
            $table->string('ruta', 100)->nullable();
            $table->string('nivel_parentesco', 200)->unique()->nullable();
            $table->string('parentesco', 200)->nullable();
            $table->string('nivel', 100);
            $table->string('orden');
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
        Schema::dropIfExists('menus');
    }
};
