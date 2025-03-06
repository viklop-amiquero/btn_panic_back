<?php

namespace Database\Seeders\security;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('clientes')->insert(
            [
                [
                    'persona_id' => 1,
                    'clave_id' => 3,
                    'username' => '78542136',
                    'verificado' => true,
                ],
                [
                    'persona_id' => 2,
                    'clave_id' => 4,
                    'username' => '78900136',
                    'verificado' => true,
                ],
                [
                    'persona_id' => 3,
                    'clave_id' => 5,
                    'username' => 'maria@gmail.com',
                    'verificado' => null,
                ],
                [
                    'persona_id' => 4,
                    'clave_id' => 6,
                    'username' => 'stefany@gmail.com',
                    'verificado' => null,
                ],
                [
                    'persona_id' => 5,
                    'clave_id' => 7,
                    'username' => 'luis@gmail.com',
                    'verificado' => null,
                ],
                [
                    'persona_id' => 6,
                    'clave_id' => 8,
                    'username' => 'ana@gmail.com',
                    'verificado' => null,
                ],
                [
                    'persona_id' => 7,
                    'clave_id' => 9,
                    'username' => 'carlosa@gmail.com',
                    'verificado' => null,
                ],

            ]
        );
    }
}
