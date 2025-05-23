<?php

namespace Database\Seeders\security;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert(
            [
                'persona_id' => 1,
                'role_id' => 1,
                'clave_id' => 8,
                'username' => '78542136',
            ]
        );

        DB::table('users')->insert([
            'persona_id' => 2,
            'role_id' => 1,
            'clave_id' => 9,
            'username' => '71112221',
        ]);

        DB::table('users')->insert(
            [
                'persona_id' => 3,
                'role_id' => 1,
                'clave_id' => 8,
                'username' => '78542136',
            ]
        );

        DB::table('users')->insert([
            'persona_id' => 4,
            'role_id' => 1,
            'clave_id' => 9,
            'username' => '71112221',
        ]);

        DB::table('users')->insert(
            [
                'persona_id' => 5,
                'role_id' => 1,
                'clave_id' => 8,
                'username' => '78542136',
            ]
        );

        DB::table('users')->insert([
            'persona_id' => 6,
            'role_id' => 1,
            'clave_id' => 9,
            'username' => '71112221',
        ]);
    }
}
