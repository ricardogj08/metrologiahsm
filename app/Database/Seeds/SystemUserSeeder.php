<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder que inicializa la tabla de usuarios del sistema.
 */
class SystemUserSeeder extends Seeder
{
    public function run()
    {
        $systemRoleModel = model('SystemRoleModel');

        $adminRole = $systemRoleModel->select('id')
            ->where('name', 'admin')
            ->first();

        $clientModel = model('ClientModel');

        $hsmClient = $clientModel->select('id')
            ->where('alias', 'hsm')
            ->first();

        $systemUserModel = model('SystemUserModel');

        $systemUserModel->ignore(true)->insertBatch([
            [
                'email'          => 'hola@genotipo.com',
                'system_role_id' => $adminRole['id'],
                'client_id'      => $hsmClient['id'],
                'name'           => 'Genotipo',
                'password'       => '$2y$10$.aohTvou4IVuzTHZphz7E.MA1quZt0H1hwr/LDAJLqClPqb6DBiiW',
                'active'         => true,
            ],
            [
                'email'          => 'fhernandez@metrologia-hsm.com',
                'system_role_id' => $adminRole['id'],
                'client_id'      => $hsmClient['id'],
                'name'           => 'HSM Sistemas de Metrología',
                'password'       => '$2y$10$5.rNNFSVn/4GnAtJNEhq6.CxiMRdyYQ38pva7rBbKktvQOhyLaTzS',
                'active'         => true,
            ],
        ]);
    }
}
