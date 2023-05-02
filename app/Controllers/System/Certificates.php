<?php

namespace App\Controllers\System;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use RuntimeException;

class Certificates extends BaseController
{
    /**
     * Registra un nuevo certificado.
     */
    public function create()
    {
        // Valida los campos del formulario.
        if (! $this->validate([
            'client_id'     => 'required|exact_length[36]|alpha_dash|is_not_unique[clients.id]',
            'office_id'     => 'if_exist|exact_length[36]|alpha_dash|is_not_unique[areas.id,client_id,{client_id}]',
            'area_id'       => 'if_exist|exact_length[36]|alpha_dash|is_not_unique[offices.id,client_id,{client_id}]',
            'instrument'    => 'required|max_length[128]',
            'type_id'       => 'required|exact_length[36]|alpha_dash|is_not_unique[types.id]',
            'description'   => 'required|max_length[128]',
            'name'          => 'required|max_length[128]',
            'received_at'   => 'required|valid_date[Y-m-d]',
            'calibrated_at' => 'required|valid_date[Y-m-d]',
            'delivered_at'  => 'required|valid_date[Y-m-d]',
            'file'          => 'uploaded[file]|max_size[file,8192]|mime_in[file,application/pdf]|ext_in[file,pdf]',
            'observations'  => 'if_exist|max_length[4096]',
        ])) {
            return print_r($this->validator->getErrors());
            return redirect()->back();
        }

        $file = $this->request->getFile('file');

        // Valida si el archivo está disponible.
        if (! $file->isValid() || $file->hasMoved()) {
            throw new RuntimeException($file->getErrorString() . '(' . $file->getError() . ')');
        }

        $newFileName = $file->getRandomName();

        $received_at   = stripAllSpaces($this->request->getPost('received_at'));
        $calibrated_at = stripAllSpaces($this->request->getPost('calibrated_at'));
        $delivered_at  = stripAllSpaces($this->request->getPost('delivered_at'));

        $certificateModel = model('CertificateModel');

        // Registra los datos del certificado.
        $certificateModel->insert([
            'client_id'     => $this->request->getPost('client_id'),
            'office_id'     => $this->request->getPost('office_id'),
            'area_id'       => $this->request->getPost('area_id'),
            'instrument'    => trimAll($this->request->getPost('instrument')),
            'type_id'       => $this->request->getPost('type_id'),
            'description'   => trimAll($this->request->getPost('description')),
            'name'          => trimAll($this->request->getPost('name')),
            'received_at'   => Time::parse($received_at)->toDateTimeString(),
            'calibrated_at' => Time::parse($calibrated_at)->toDateTimeString(),
            'delivered_at'  => Time::parse($delivered_at)->toDateTimeString(),
            'file'          => $newFileName,
            'observations'  => trimAll($this->request->getPost('observations')) ?: null,
        ]);

        // Almacena el certificado.
        $file->move(WRITEPATH . 'uploads', $newFileName);

        return redirect()->back();
    }

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
