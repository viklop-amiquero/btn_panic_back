<?php

namespace Database\Seeders\security;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('personas')->insert([
            [
                'nombre' => 'Bart',
                'apellido' => 'Antonio',
                'direccion_domicilio' => 'Pasaje Primavera 12',
                // 'dni' => '12547896',
                // 'digito_verificador' => '1',
                'telefono' => '12547896',
            ],
            [
                'nombre' => 'Katy',
                'apellido' => 'Salazar',
                'direccion_domicilio' => 'Jirón las Bagnolias 1149',
                // 'dni' => '01547896',
                // 'digito_verificador' => '2',
                'telefono' => '12547896',
            ],
            [
                'nombre' => 'María',
                'apellido' => 'Gómez',
                'direccion_domicilio' => 'Av. Los Álamos 23',
                // 'dni' => '12247896',
                // 'digito_verificador' => '3',
                'telefono' => '12547896',
            ],
            [
                'nombre' => 'Stefany',
                'apellido' => 'Palomino',
                'direccion_domicilio' => 'Pasaje Primavera 12',
                // 'dni' => '12547336',
                // 'digito_verificador' => '4',
                'telefono' => '12547896',
            ],
            [
                'nombre' => 'Luis',
                'apellido' => 'Fernández',
                'direccion_domicilio' => 'Calle Los Rosales 45',
                // 'dni' => '42947896',
                // 'digito_verificador' => '5',
                'telefono' => '12547896',
            ],
            [
                'nombre' => 'Ana',
                'apellido' => 'Torres',
                'direccion_domicilio' => 'Jr. Las Flores 89',
                // 'dni' => '02107896',
                // 'digito_verificador' => '6',
                'telefono' => '12547896',
            ],
            [
                'nombre' => 'Carlos',
                'apellido' => 'Mendoza',
                'direccion_domicilio' => 'Urb. Santa Rosa 101',
                // 'dni' => '12540212',
                // 'digito_verificador' => '7',
                'telefono' => '12547896',
            ],
            [
                'nombre' => 'Jessica',
                'apellido' => 'Salazar',
                'direccion_domicilio' => 'Av. Miraflores 67',
                // 'dni' => '12357896',
                // 'digito_verificador' => '8',
                'telefono' => '12547896',
            ],
            [
                'nombre' => 'Ximena',
                'apellido' => 'Borda',
                'direccion_domicilio' => 'Pasaje Primavera 12',
                // 'dni' => '12000896',
                // 'digito_verificador' => '9',
                'telefono' => '12547896',
            ]
        ]);
    }
}
