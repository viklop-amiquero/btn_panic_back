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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('persona_id')
                ->references('id')
                ->on('personas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('clave_id')
                ->references('id')
                ->on('claves')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('username')->unique();
            $table->unsignedTinyInteger('password_attempts')->default(0);
            $table->boolean('verificado')->nullable();
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
        Schema::dropIfExists('clientes');
    }
};
