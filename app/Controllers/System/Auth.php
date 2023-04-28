<?php

namespace App\Controllers\System;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    /**
     * Renderiza la página de inicio de sesión
     * y genera la sesión de un usuario.
     */
    public function login()
    {
        // Valida los campos del formulario.
        if (! $this->request->is('post') || ! $this->validate(
            [
                'email'    => 'required|max_length[256]|valid_email|is_not_unique[system_users.email]',
                'password' => 'required|min_length[8]|max_length[32]|password',
            ],
            [
                'password' => [
                    'password' => lang('Validation.regex_match'),
                ],
            ]
        )) {
            return view('system/auth/login');
        }

        $systemUserModel = model('SystemUserModel');

        // Consulta los datos del usuario.
        $user = $systemUserModel->select('system_users.id, system_users.name, system_users.password, system_users.active, system_roles.name as role')
            ->role()
            ->where('system_users.email', lowerCase(stripAllSpaces($this->request->getPost('email'))))
            ->first();

        // Valida la contraseña del usuario.
        if (! password_verify($this->request->getPost('password'), $user['password'])) {
            return redirect()
                ->route('system.auth.login')
                ->withInput()
                ->with('error', 'La identificación de sesión o la contraseña son incorrectas');
        }

        // Define las variables de sesión.
        session()->set('systemUser', [
            'id'     => $user['id'],
            'name'   => $user['name'],
            'active' => $user['active'],
            'role'   => $user['role'],
        ]);

        return redirect()->route('system.certificates.index');
    }

    /**
     * Cierra la sesión de un usuario.
     */
    public function logout()
    {
        session()->remove('systemUser');

        return redirect()->route('system.auth.login');
    }

    /**
     * Renderiza la página de nueva contraseña
     * y actualiza la contraseña de un usuario.
     */
    public function newPassword()
    {
        // Valida los campos del formulario.
        if (! $this->request->is('post') || ! $this->validate(
            [
                'password'     => 'required|min_length[8]|max_length[32]|password',
                'pass_confirm' => 'matches[password]',
            ],
            [
                'password' => [
                    'password' => lang('Validation.regex_match'),
                ],
            ]
        )) {
            return view('system/auth/newPassword');
        }

        $systemUserModel = model('SystemUserModel');

        // Actualiza la contraseña del usuario.
        $systemUserModel->update(session('systemUser.id'), [
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'active'   => true,
        ]);

        return $this->logout();
    }
}
