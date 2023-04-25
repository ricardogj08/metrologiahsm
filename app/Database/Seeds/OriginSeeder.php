<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder que inicializa la tabla de orígenes.
 */
class OriginSeeder extends Seeder
{
    public function run()
    {
        $originModel = model('OriginModel');

        $originModel->ignore(true)->insertBatch([
            [
                'name' => 'A través de Google',
            ],
            [
                'name' => 'Redes Sociales',
            ],
            [
                'name' => 'Publicidad Impresa',
            ],
            [
                'name' => 'Visita de un Ejecutivo',
            ],
            [
                'name' => 'Recomendación / Referencia',
            ],
            [
                'name' => 'Mailing',
            ],
            [
                'name' => 'Otro',
            ],
        ]);
    }
}
