<?php

namespace App\Controllers\Website;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    /**
     * Renderiza la página de mantenimiento.
     */
    public function maintenance()
    {
        return view('website/pages/maintenance', [
            'favicon' => setting()->get('App.general', 'favicon'),
        ]);
    }
}
