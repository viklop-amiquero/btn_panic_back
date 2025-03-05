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
                'username' => '78542136',
                'verificado' => true,
                'tipo_usuario' => 'admin',
            ],
            [
                'persona_id' => 2,
                'role_id' => 1,
                'username' => '78542136',
                'verificado' => true,
                'tipo_usuario' => 'admin',
            ],
            [
                'persona_id' => 3,
                'role_id' => null,
                'username' => 'maria@gmail.com',
                'verificado' => null,
                'tipo_usuario' => 'cliente',
            ],
            [
                'persona_id' => 4,
                'role_id' => null,
                'username' => 'stefany@gmail.com',
                'verificado' => null,
                'tipo_usuario' => 'cliente',
            ],
            [
                'persona_id' => 5,
                'role_id' => null,
                'username' => 'luis@gmail.com',
                'verificado' => null,
                'tipo_usuario' => 'cliente',
            ],
            [
                'persona_id' => 6,
                'role_id' => null,
                'username' => 'ana@gmail.com',
                'verificado' => null,
                'tipo_usuario' => 'cliente',
            ],
            [
                'persona_id' => 7,
                'role_id' => null,
                'username' => 'carlosa@gmail.com',
                'verificado' => null,
                'tipo_usuario' => 'cliente',
            ],
            [
                'persona_id' => 8,
                'role_id' => null,
                'username' => 'jessica@gmail.com',
                'verificado' => null,
                'tipo_usuario' => 'cliente',
            ],
            [
                'persona_id' => 9,
                'role_id' => null,
                'username' => 'ximena@gmail.com',
                'verificado' => null,
                'tipo_usuario' => 'cliente',
            ]
        );
    }
}
