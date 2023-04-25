<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder que inicializa la tabla de estados.
 */
class StateSeeder extends Seeder
{
    public function run()
    {
        $stateModel = model('StateModel');

        $stateModel->ignore(true)->insertBatch([
            [
                'name' => 'Aguascalientes',
            ],
            [
                'name' => 'Baja California',
            ],
            [
                'name' => 'Baja California Sur',
            ],
            [
                'name' => 'Campeche',
            ],
            [
                'name' => 'Chiapas',
            ],
            [
                'name' => 'Chihuahua',
            ],
            [
                'name' => 'Ciudad de México',
            ],
            [
                'name' => 'Coahuila',
            ],
            [
                'name' => 'Colima',
            ],
            [
                'name' => 'Durango',
            ],
            [
                'name' => 'Estado de México',
            ],
            [
                'name' => 'Guanajuato',
            ],
            [
                'name' => 'Guerrero',
            ],
            [
                'name' => 'Hidalgo',
            ],
            [
                'name' => 'Jalisco',
            ],
            [
                'name' => 'Michoacán',
            ],
            [
                'name' => 'Morelos',
            ],
            [
                'name' => 'Nayarit',
            ],
            [
                'name' => 'Nuevo León',
            ],
            [
                'name' => 'Oaxaca',
            ],
            [
                'name' => 'Puebla',
            ],
            [
                'name' => 'Querétaro',
            ],
            [
                'name' => 'Quintana Roo',
            ],
            [
                'name' => 'San Luis Potosí',
            ],
            [
                'name' => 'Sinaloa',
            ],
            [
                'name' => 'Sonora',
            ],
            [
                'name' => 'Tabasco',
            ],
            [
                'name' => 'Tamaulipas',
            ],
            [
                'name' => 'Tlaxcala',
            ],
            [
                'name' => 'Veracruz',
            ],
            [
                'name' => 'Yucatán',
            ],
            [
                'name' => 'Zacatecas',
            ],
        ]);
    }
}
