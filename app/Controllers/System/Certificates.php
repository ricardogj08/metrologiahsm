<?php

namespace App\Controllers\System;

use App\Controllers\BaseController;

class Certificates extends BaseController
{
    /**
     * Renderiza la página de los certificados.
     */
    public function index()
    {
        return view('system/certificates/index');
    }
}
