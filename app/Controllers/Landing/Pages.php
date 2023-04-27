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
        $stateModel = model('StateModel');

        // Consulta todos los estados.
        $states = $stateModel->orderBy('name', 'asc')
            ->findAll();

        $originModel = model('OriginModel');

        // Consulta todos los orígenes.
        $origins = $originModel->orderBy('id')
            ->findAll();

        return view('landing/pages/show', [
            'states'  => $states,
            'origins' => $origins,
            'phones'  => setting()->get('App.general', 'phones'),
        ]);
    }
}
