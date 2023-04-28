<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder que inicializa la tabla de tipos de certificados.
 */
class TypeSeeder extends Seeder
{
    public function run()
    {
        $typeModel = model('TypeModel');

        $typeModel->ignore(true)->insertBatch([
            [
                'name' => 'Certificado de Calibración',
            ],
            [
                'name' => 'Certificado de Estudio TUS',
            ],
            [
                'name' => 'Verificación',
            ],
            [
                'name' => 'Reporte de Falla',
            ],
        ]);
    }
}
