<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;

class Account extends BaseController
{
    /**
     * Renderiza la página para modificar las cuentas de sesión
     * y modifica los datos del usuario de sesión.
     */
    public function update()
    {
        $userModel = model('UserModel');

        // Consulta los datos del usuario de sesión.
        $user = $userModel->select('id, name, email, password')
            ->where('active', true)
            ->find(session('user.id'));

        if (empty($user)) {
            return redirect()->route('backend.auth.logout');
        }

        // Valida los campos del formulario.
        if (! $this->request->is('post') || ! $this->validate(
            [
                'name'         => 'required|max_length[128]',
                'email'        => "required|max_length[256]|valid_email|is_unique[users.email,id,{$user['id']}]",
                'password'     => 'permit_empty|min_length[8]|max_length[32]|password',
                'pass_confirm' => 'required_with[password]|matches[password]',
            ],
            [
                'password' => [
                    'password' => lang('Validation.regex_match'),
                ],
            ]
        )) {
            return view('backend/account/update', [
                'user' => $user,
            ]);
        }

        $password = $this->request->getPost('password');

        // Actualiza los datos del usuario de sesión.
        $userModel->update($user['id'], [
            'name'     => trimAll($this->request->getPost('name')),
            'email'    => lowerCase(stripAllSpaces($this->request->getPost('email'))),
            'password' => $password
                ? password_hash($password, PASSWORD_DEFAULT)
                : $user['password'],
        ]);

        // Consulta los datos actualizados del usuario de sesión.
        $user = $userModel->select('users.id, users.name, roles.name as role')
            ->role()
            ->find($user['id']);

        // Actualiza las variables de sesión.
        session()->set('user', [
            'id'   => $user['id'],
            'name' => $user['name'],
            'role' => $user['role'],
        ]);

        return redirect()
            ->route('backend.account.update')
            ->with('toast-success', 'Tu cuenta se ha modificado correctamente');
    }
}
