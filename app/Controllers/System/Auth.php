<?php

namespace App\Controllers\System;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    /**
     * Renderiza la página de inicio de sesión.
     */
    public function login()
    {
        return view('system/auth/login');
    }

    /**
     * Renderiza la página de nueva contraseña.
     */
    public function newPassword()
    {
        return view('system/auth/newPassword');
    }
}
