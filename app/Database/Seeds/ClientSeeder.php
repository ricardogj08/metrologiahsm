<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder que inicializa la tabla de clientes.
 */
class ClientSeeder extends Seeder
{
    public function run()
    {
        $sectorModel = model('SectorModel');

        $metrologiaSector = $sectorModel->select('id')
            ->where('alias', 'sistemas-metrologia')
            ->first();

        $electrSector = $sectorModel->select('id')
            ->where('alias', 'industrial-electronica')
            ->first();

        $clientModel = model('ClientModel');

        $clientModel->ignore(true)->insertBatch([
            [
                'name'      => 'HSM Sistemas de Metrología',
                'sector_id' => $metrologiaSector['id'],
                'alias'     => 'hsm',
            ],
            [
                'name'      => 'Harman International de México',
                'sector_id' => $electrSector['id'],
                'alias'     => 'harman',
            ],
        ]);
    }
}
