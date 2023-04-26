<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder principal que inicializa
 * tablas de la base de datos.
 */
class MainSeeder extends Seeder
{
    public function run()
    {
        $this->call('StateSeeder');
        $this->call('OriginSeeder');
        $this->call('SettingSeeder');
    }
}
