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
        $rowsInformation = [
            [
                'ID Instrumento'       => 'ABC-123',
                'Descripición'         => 'Certificado',
                'Fecha de Recepción'   => '15 - 01 - 2023',
                'Fecha de Calibración' => '15 - 01 - 2023',
                'Fecha de Entrega'     => '15 - 01 - 2023',
                'Observaciones'        => 'Equipo en espera de información…',
            ],
            [
                'ID Instrumento'       => 'ABC-123',
                'Descripición'         => 'Certificado',
                'Fecha de Recepción'   => '15 - 01 - 2023',
                'Fecha de Calibración' => '15 - 01 - 2023',
                'Fecha de Entrega'     => '15 - 01 - 2023',
                'Observaciones'        => 'Equipo en espera de información…',
            ],
        ];

        $columns = array_keys($rowsInformation[0]);

        return view('system/certificates/index', [
            'columns'         => $columns,
            'rowsInformation' => $rowsInformation,
        ]);
    }
}
