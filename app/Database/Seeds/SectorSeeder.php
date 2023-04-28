<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder que inicializa la tabla de sectores de los clientes.
 */
class SectorSeeder extends Seeder
{
    public function run()
    {
        $sectorModel = model('SectorModel');

        $sectorModel->ignore(true)->insertBatch([
            [
                'name'  => 'Industrial Electrónica',
                'alias' => 'industrial-electronica',
            ],
            [
                'name'  => 'Sistemas de Metrología',
                'alias' => 'sistemas-metrologia',
            ],
        ]);
    }
}
