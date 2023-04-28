<?php

namespace App\Controllers\Website;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    /**
     * Renderiza la página de sitio en construcción.
     */
    public function construction()
    {
        return view('website/pages/construction', [
            'favicon' => setting()->get('App.general', 'favicon'),
        ]);
    }
}
