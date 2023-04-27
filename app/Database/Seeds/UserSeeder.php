<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder que inicializa la tabla de usuarios de acceso.
 */
class UserSeeder extends Seeder
{
    public function run()
    {
        $roleModel = model('RoleModel');

        $role = $roleModel
            ->select('id')
            ->where('name', 'admin')
            ->first();

        $userModel = model('UserModel');

        $userModel->ignore(true)->insert([
            'name'     => 'Genotipo',
            'email'    => 'hola@genotipo.com',
            'role_id'  => $role['id'],
            'active'   => true,
            'password' => '$2y$10$b0exVBVj0gIuO/Ry56mxDelOWkrDJVRuZKOMMLYVF03l75nkvOm9i',
        ]);
    }
}
