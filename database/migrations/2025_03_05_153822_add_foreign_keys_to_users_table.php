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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->foreignId('persona_id')
                ->references('id')
                ->on('personas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('role_id')
                ->references('id')
                ->on('roles')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('clave_id')
                ->references('id')
                ->on('claves')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign('users_persona_id_foreign');
            $table->dropForeign('users_role_id_foreign');
            $table->dropForeign('users_clave_id_foreign');
        });
    }
};
