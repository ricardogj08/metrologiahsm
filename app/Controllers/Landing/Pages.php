<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    /**
     * Renderiza la página de una landing.
     *
     * @param mixed|null $slug
     */
    public function show($slug = null)
    {
        return view('landing/pages/show');
    }
}
