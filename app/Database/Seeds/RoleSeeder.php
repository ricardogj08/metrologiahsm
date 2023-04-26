<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder que inicializa la tabla de los roles de los usuarios.
 */
class RoleSeeder extends Seeder
{
    public function run()
    {
        $roleModel = model('RoleModel');

        $roleModel->ignore(true)->InsertBatch([
            [
                'name'        => 'admin',
                'description' => 'Administrador',
            ],
            [
                'name'        => 'editor',
                'description' => 'Editor',
            ],
            [
                'name'        => 'analyst',
                'description' => 'Analista',
            ],
        ]);
    }
}
