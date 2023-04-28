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
        $this->call('RoleSeeder');
        $this->call('UserSeeder');
        $this->call('TypeSeeder');
        $this->call('SectorSeeder');
        $this->call('ClientSeeder');
        $this->call('SystemRoleSeeder');
        $this->call('SystemUserSeeder');
    }
}
