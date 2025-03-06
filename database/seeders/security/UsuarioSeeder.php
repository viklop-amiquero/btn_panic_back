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
                'persona_id' => 2,
                'role_id' => 1,
                'clave_id' => 2,
                'username' => '78542136',
            ]
        );

        DB::table('users')->insert([
            'persona_id' => 2,
            'role_id' => 1,
            'clave_id' => 2,
            'username' => '71112221',
        ]);
    }
}
