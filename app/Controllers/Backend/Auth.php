<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

use CodeIgniter\I18n\Time;

class Auth extends BaseController
{
    /**
     * Renderiza la página de inicio de sesión
     * y genera la sesión de un usuario.
     */
    public function login()
    {
        // Valida los campos del formulario.
        if (! $this->request->is('post') || ! $this->validate(
            [
                'email'    => 'required|max_length[256]|valid_email|is_not_unique[users.email,active,1]',
                'password' => 'required|min_length[8]|max_length[32]|password',
            ],
            [
                'password' => [
                    'password' => lang('Validation.regex_match'),
                ],
            ]
        )) {
            return view('backend/auth/login');
        }

        $userModel = model('UserModel');

        // Consulta los datos del usuario.
        $user = $userModel->select('users.id, users.name, users.email, users.password, roles.name as role')
            ->role()
            ->where('users.email', lowerCase(stripAllSpaces($this->request->getPost('email'))))
            ->first();

        // Valida la contraseña del usuario.
        if (! password_verify($this->request->getPost('password'), $user['password'])) {
            return redirect()
                ->route('backend.auth.login')
                ->withInput()
                ->with('error', 'La identificación de sesión o la contraseña son incorrectas');
        }

        // Define las variables de sesión.
        session()->set('user', [
            'id'   => $user['id'],
            'name' => $user['name'],
            'role' => $user['role'],
        ]);

        return redirect()->route('backend.modules.prospects.index');
    }

    /**
     * Cierra la sesión de un usuario.
     */
    public function logout()
    {
        session()->remove('user');

        return redirect()->route('backend.auth.login');
    }

    /**
     * Renderiza la página para solicitar la recuperación de una contraseña
     * y envía un enlace de recuperación de contraseña por email.
     */
    public function forgotten()
    {
        // Valida los campos del formulario.
        if (! $this->request->is('post') || ! $this->validate([
            'email' => 'required|max_length[256]|valid_email|is_not_unique[users.email,active,1]',
        ])) {
            return view('backend/auth/forgotten');
        }

        $userModel = model('UserModel');

        // Consulta los datos del usuario.
        $user = $userModel->select('id, name, email')
            ->where('email', lowerCase(stripAllSpaces($this->request->getPost('email'))))
            ->first();

        // Genera una llave de autenticación aleatoria.
        $key = random_string('crypto', 32);

        $email = service('email');

        // Define el remitente y el destinatario del email.
        $email->setFrom(config('Email')->SMTPUser, setting()->get('App.general', 'company'));
        $email->setTo($user['email']);

        // Define el asunto y el cuerpo del mensaje.
        $email->setSubject('Recupera tu cuenta');
        $email->setMessage(view('backend/emails/recovery', [
            'user' => $user,
            'key'  => $key,
        ]));

        // Envía el email.
        if (! $email->send()) {
            return redirect()
                ->route('backend.auth.forgotten')
                ->withInput()
                ->with('error', 'Tuvimos un problema al enviar tu mensaje de correo electrónico, por favor inténtelo de nuevo');
        }

        $authModel = model('AuthModel');

        // Consulta si existe previamente una solicitud de recuperación.
        $auth = $authModel->select('id')
            ->where('user_id', $user['id'])
            ->first();

        $data = [
            'user_id'    => $user['id'],
            'secret'     => hash('sha512', $key),
            'expires_at' => (new Time('+1 hours'))->toDateTimeString(), // 1 hora
        ];

        if ($auth) {
            $data['id'] = $auth['id'];
        }

        // Registra o actualiza el hash de autenticación del usuario.
        $authModel->save($data);

        return redirect()
            ->route('backend.auth.login')
            ->with('success', 'Por favor verifica tu dirección de correo electrónico');
    }

    /**
     * Renderiza la página para restaurar una contraseña
     * y restaura la contraseña de un usuario.
     *
     * @param mixed|null $id
     * @param mixed|null $key
     */
    public function recovery($id = null, $key = null)
    {
        // Valida si existe el usuario.
        if (! $this->validateData(
            ['id' => $id],
            ['id' => 'required|is_natural_no_zero|is_not_unique[users.id,active,1]'],
        )) {
            throw PageNotFoundException::forPageNotFound();
        }

        $authModel = model('AuthModel');

        // Consulta los datos de autenticación del usuario.
        $auth = $authModel->select('auth.id, auth.user_id, auth.secret, auth.expires_at')
            ->user()
            ->where('auth.user_id', $id)
            ->first();

        // Valida la llave de autenticación del usuario.
        if (! $auth || ! hash_equals($auth['secret'], hash('sha512', $key))) {
            throw PageNotFoundException::forPageNotFound();
        }

        // Valida si la llave de autenticación ha expirado.
        if (Time::now()->isAfter(Time::parse($auth['expires_at']))) {
            return redirect()
                ->route('backend.auth.forgotten')
                ->with('error', 'Tu enlace de recuperación de contraseña ha expirado, por favor inténtelo de nuevo');
        }

        // Valida los campos del formulario.
        if (! $this->request->is('post') || ! $this->validate(
            [
                'password'     => 'required|min_length[8]|max_length[32]|password',
                'pass_confirm' => 'required|matches[password]',
            ],
            [
                'password' => [
                    'password' => lang('Validation.regex_match'),
                ],
            ]
        )) {
            return view('backend/auth/recovery', [
                'auth' => $auth,
                'key'  => $key,
            ]);
        }

        $userModel = model('UserModel');

        // Actualiza la contraseña del usuario.
        $userModel->update($auth['user_id'], [
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        // Elimina el registro de autenticación.
        $authModel->delete($auth['id']);

        return redirect()
            ->route('backend.auth.login')
            ->with('success', 'Tu contraseña se ha actualizado correctamente');
    }
}
