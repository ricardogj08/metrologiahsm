<?php

namespace App\Controllers\System;

use App\Controllers\BaseController;

class Users extends BaseController
{
    /**
     * Registra un nuevo usuario.
     */
    public function create()
    {
        // Valida los campos del formulario.
        if (! $this->validate(
            [
                'client_id' => 'required|exact_length[36]|alpha_dash|is_not_unique[clients.id]',
                'firstname' => 'required|max_length[42]',
                'lastname'  => 'required|max_length[85]',
                'email'     => 'required|max_length[256]|valid_email|is_unique[system_users.email]',
                'password'  => 'required|min_length[8]|max_length[32]|password',
                'area_id'   => 'if_exist|exact_length[36]|alpha_dash|is_not_unique[areas.id,client_id,{client_id}]',
                'office_id' => 'if_exist|exact_length[36]|alpha_dash|is_not_unique[offices.id,client_id,{client_id}]',
            ],
            [
                'password' => [
                    'password' => lang('Validation.regex_match'),
                ],
            ]
        )) {
            return redirect()->back()->withInput();
        }

        $systemRoleModel = model('SystemRoleModel');

        // Consulta el ID del rol de usuario.
        $userRole = $systemRoleModel->select('id')
            ->where('name', 'user')
            ->first();

        $systemUserModel = model('SystemUserModel');

        $firstName = trimAll($this->request->getPost('firstname'));
        $lastName  = trimAll($this->request->getPost('lastname'));

        // Registra los datos del usuario.
        $systemUserModel->insert([
            'client_id'      => $this->request->getPost('client_id'),
            'name'           => $firstName . ' ' . $lastName,
            'email'          => lowerCase(stripAllSpaces($this->request->getPost('email'))),
            'password'       => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'area_id'        => $this->request->getPost('area_id'),
            'office_id'      => $this->request->getPost('office_id'),
            'system_role_id' => $userRole['id'],
            'active'         => false,
        ]);

        return redirect()->back();
    }
}
