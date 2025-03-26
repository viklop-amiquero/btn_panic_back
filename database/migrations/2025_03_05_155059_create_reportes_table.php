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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->string('imagen')->nullable();
            $table->text('descripcion');
            $table->string('direccion');
            $table->foreignId('user_id')
                ->nullable()
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('categoria_id')
                ->references('id')
                ->on('categorias')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->decimal('latitud');
            $table->decimal('longitud');

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
        Schema::dropIfExists('reportes');
    }
};
