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
                'apellido_paterno' => 'Antonio',
                'apellido_materno' => 'De la Cruz',
                'direccion_domicilio' => 'Pasaje Primavera 12',
                'dni' => '12547896',
                'digito_verificador' => '1',
            ],
            [
                'nombre' => 'Katy',
                'apellido_paterno' => 'Salazar',
                'apellido_materno' => 'Vega',
                'direccion_domicilio' => 'Jirón las Bagnolias 1149',
                'dni' => '01547896',
                'digito_verificador' => '2',
            ],
            [
                'nombre' => 'María',
                'apellido_paterno' => 'Gómez',
                'apellido_materno' => 'Sánchez',
                'direccion_domicilio' => 'Av. Los Álamos 23',
                'dni' => '12247896',
                'digito_verificador' => '3',
            ],
            [
                'nombre' => 'Stefany',
                'apellido_paterno' => 'Palomino',
                'apellido_materno' => 'De la Cruz',
                'direccion_domicilio' => 'Pasaje Primavera 12',
                'dni' => '12547336',
                'digito_verificador' => '4',
            ],
            [
                'nombre' => 'Luis',
                'apellido_paterno' => 'Fernández',
                'apellido_materno' => 'Pérez',
                'direccion_domicilio' => 'Calle Los Rosales 45',
                'dni' => '42947896',
                'digito_verificador' => '5',
            ],
            [
                'nombre' => 'Ana',
                'apellido_paterno' => 'Torres',
                'apellido_materno' => 'Ramos',
                'direccion_domicilio' => 'Jr. Las Flores 89',
                'dni' => '02107896',
                'digito_verificador' => '6',
            ],
            [
                'nombre' => 'Carlos',
                'apellido_paterno' => 'Mendoza',
                'apellido_materno' => 'Lopez',
                'direccion_domicilio' => 'Urb. Santa Rosa 101',
                'dni' => '12540212',
                'digito_verificador' => '7',
            ],
            [
                'nombre' => 'Jessica',
                'apellido_paterno' => 'Salazar',
                'apellido_materno' => 'Vega',
                'direccion_domicilio' => 'Av. Miraflores 67',
                'dni' => '12357896',
                'digito_verificador' => '8',
            ],
            [
                'nombre' => 'Ximena',
                'apellido_paterno' => 'Borda',
                'apellido_materno' => 'De la Cruz',
                'direccion_domicilio' => 'Pasaje Primavera 12',
                'dni' => '12000896',
                'digito_verificador' => '9',
            ]
        ]);
    }
}
