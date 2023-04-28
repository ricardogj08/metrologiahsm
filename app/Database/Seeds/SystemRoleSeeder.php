<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder que inicializa la tabla de roles del sistema.
 */
class SystemRoleSeeder extends Seeder
{
    public function run()
    {
        $systemRoleModel = model('SystemRoleModel');

        $systemRoleModel->ignore(true)->insertBatch([
            [
                'name'        => 'admin',
                'description' => 'Administrador',
            ],
            [
                'name'        => 'user',
                'description' => 'Usuario',
            ],
        ]);
    }
}
