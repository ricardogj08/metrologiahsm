<?php

namespace App\Controllers\Landing;

use App\Controllers\BaseController;

class Prospects extends BaseController
{
    /**
     * Registra los datos de un prospecto.
     */
    public function create()
    {
        // Valida los campos del formulario.
        if (! $this->validate([
            'state_id'  => 'required|is_natural_no_zero|is_not_unique[states.id]',
            'origin_id' => 'required|is_natural_no_zero|is_not_unique[origins.id]',
            'name'      => 'required|max_length[128]',
            'phone'     => 'required|max_length[15]|numeric',
            'email'     => 'required|max_length[256]|valid_email',
            'company'   => 'required|max_length[128]',
            'message'   => 'required|max_length[4096]',
        ])) {
            return redirect()
                ->back()
                ->withInput();
        }

        $prospectModel = model('ProspectModel');

        // Registra los datos del prospecto.
        $prospectModel->insert([
            'state_id'  => $this->request->getPost('state_id'),
            'origin_id' => $this->request->getPost('origin_id'),
            'name'      => trimAll($this->request->getPost('name')),
            'phone'     => stripAllSpaces($this->request->getPost('phone')),
            'email'     => lowerCase(stripAllSpaces($this->request->getPost('email'))),
            'company'   => trimAll($this->request->getPost('company')),
            'message'   => trimAll($this->request->getPost('message')),
        ]);

        $id = $prospectModel->getInsertID();

        // Consulta los datos del prospecto.
        $prospect = $prospectModel->select('prospects.name, prospects.phone, prospects.email, prospects.company, states.name as state, origins.name as origin, prospects.created_at')
            ->state()
            ->origin()
            ->find($id);

        $email = service('email');

        // Define el remitente y los destinatarios del email.
        $email->setFrom(config('Email')->SMTPUser, setting()->get('App.general', 'company'));
        $email->setTo(setting()->get('App.emails', 'to'));
        $email->setCC(setting()->get('App.emails', 'cc'));
        $email->setBCC(setting()->get('App.emails', 'bcc'));

        // Define el asunto y el cuerpo del mensaje.
        $email->setSubject('Prospecto');
        $email->setMessage(view('backend/emails/prospect', [
            'title'    => 'Prospecto de Google Ads',
            'prospect' => $prospect,
        ]));

        // Envía el email.
        if ($email->send()) {
            return view('website/prospects/create');
        }

        // Elimina el registro del prospecto si falla el envío.
        $prospectModel->delete($id);

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Tuvimos un problema al enviar el mensaje de correo electrónico, por favor inténtelo de nuevo');
    }
}
