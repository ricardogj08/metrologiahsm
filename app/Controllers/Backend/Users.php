<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\I18n\Time;

class Users extends BaseController
{
    /**
     * Renderiza la página para registrar un usuario de acceso
     * y registra los datos de un usuario de acceso.
     */
    public function create()
    {
        // Valida los campos del formulario.
        if (! $this->request->is('post') || ! $this->validate(
            [
                'name'         => 'required|max_length[128]',
                'email'        => 'required|max_length[256]|valid_email|is_unique[users.email]',
                'role_id'      => 'required|is_natural_no_zero|is_not_unique[roles.id]',
                'password'     => 'required|min_length[8]|max_length[32]|password',
                'pass_confirm' => 'required|matches[password]',
            ],
            [
                'password' => [
                    'password' => lang('Validation.regex_match'),
                ],
            ]
        )) {
            $roleModel = model('RoleModel');

            // Consulta todos los roles del dashboard.
            $roles = $roleModel->select('id, description')
                ->orderBy('id', 'asc')
                ->findAll();

            return view('backend/users/create', [
                'roles' => $roles,
            ]);
        }

        $userModel = model('UserModel');

        // Registra el nuevo usuario.
        $userModel->insert([
            'name'     => trimAll($this->request->getPost('name')),
            'email'    => lowerCase(stripAllSpaces($this->request->getPost('email'))),
            'role_id'  => $this->request->getPost('role_id'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()
            ->route('backend.users.index')
            ->with('toast-success', 'El usuario de acceso se ha registrado correctamente');
    }

    /**
     * Renderiza la página de todos los usuarios de acceso.
     */
    public function index()
    {
        // Define los campos de filtrado de resultados.
        $filterFields = [
            'name'  => 'Nombre',
            'email' => 'Email',
        ];

        $filterList = implode(',', array_keys($filterFields));

        // Define los campos de ordenamiento de resultados.
        $sortByFields = [
            'name'       => 'Nombre',
            'created_at' => 'Fecha de registro',
        ];

        $sortByList = implode(',', array_keys($sortByFields));

        // Define los modos de ordenamiento de resultados.
        $sortOrderFields = [
            'asc'  => 'Ascendente',
            'desc' => 'Descendente',
        ];

        $sortOrderList = implode(',', array_keys($sortOrderFields));

        // Define los modos de filtrado por cuentas activas.
        $activeFilterFields = [
            'true'  => 'Activos',
            'false' => 'Inactivos',
        ];

        $activeFilterList = implode(',', array_keys($activeFilterFields));

        // Valida los parámetros de búsqueda y consulta de resultados.
        if (! $this->validate([
            'q'         => 'if_exist|max_length[256]',
            'filter'    => "permit_empty|in_list[{$filterList}]",
            'sortBy'    => "permit_empty|in_list[{$sortByList}]",
            'sortOrder' => "permit_empty|in_list[{$sortOrderList}]",
            'role_id'   => 'permit_empty|is_natural_no_zero|is_not_unique[roles.id]',
            'active'    => "permit_empty|string|in_list[{$activeFilterList}]",
            'dateFrom'  => 'permit_empty|valid_date[Y-m-d]',
            'dateTo'    => 'permit_empty|valid_date[Y-m-d]',
        ])) {
            return redirect()
                ->route('backend.users.index')
                ->withInput();
        }

        // Obtiene el patrón de búsqueda (por defecto: '').
        $queryParam = trimAll($this->request->getGet('q'));

        // Obtiene el campo de filtrado de resultados (por defecto: 'name').
        $filterParam = stripAllSpaces($this->request->getGet('filter')) ?: 'name';

        // Obtiene el campo de ordenamiento (por defecto: 'created_at').
        $sortByParam = stripAllSpaces($this->request->getGet('sortBy')) ?: 'created_at';

        // Obtiene el campo del modo de ordenamiento (por defecto: 'desc');
        $sortOrderParam = stripAllSpaces($this->request->getGet('sortOrder')) ?: 'desc';

        // Obtiene el campo de filtrado por rol (por defecto: '').
        $roleIdParam = $this->request->getGet('role_id');

        // Obtiene el campo de filtrado por cuentas activas (por defecto: '').
        $activeFilterParam = stripAllSpaces($this->request->getGet('active'));

        // Obtiene el campo de filtrado por fecha desde (por defecto: '').
        $dateFromParam = stripAllSpaces($this->request->getGet('dateFrom'));

        // Obtiene el campo de filtrado por fecha hasta (por defecto: '').
        $dateToParam = stripAllSpaces($this->request->getGet('dateTo'));

        $roleModel = model('RoleModel');

        // Consulta todos los roles del backend.
        $roles = $roleModel->select('id, description')
            ->orderBy('id', 'asc')
            ->findAll();

        $userModel = model('UserModel');

        // Define los campos a seleccionar.
        $builder = $userModel->select('users.id, users.name, users.email, users.active, roles.description as role, users.created_at');

        // Filtra los resultados por role.
        if ($roleIdParam) {
            $builder->where('users.role_id', $roleIdParam);
        }

        // Filtra los resultados por cuentas activas.
        if ($activeFilterParam) {
            $builder->where('users.active', $activeFilterParam === 'true');
        }

        // Filtra los resultados por fecha desde.
        if ($dateFromParam) {
            $builder->where('users.created_at >=', Time::parse($dateFromParam)->toDateTimeString());
        }

        // Filtra los resultados por fecha hasta.
        if ($dateToParam) {
            $builder->where('users.created_at <', Time::parse('+1 day ' . $dateToParam)->toDateTimeString());
        }

        /**
         * Consulta todos los usuarios
         * que coinciden con el patrón de búsqueda
         * con paginación.
         */
        $users = $builder
            ->role()
            ->like('users.' . $filterParam, $queryParam)
            ->where('users.id !=', session('user.id'))
            ->orderBy('users.' . $sortByParam, $sortOrderParam)
            ->paginate(8);

        return view('backend/users/index', [
            'queryParam'         => $queryParam,
            'filterFields'       => $filterFields,
            'filterParam'        => $filterParam,
            'sortByFields'       => $sortByFields,
            'sortByParam'        => $sortByParam,
            'sortOrderFields'    => $sortOrderFields,
            'sortOrderParam'     => $sortOrderParam,
            'roles'              => $roles,
            'roleIdParam'        => $roleIdParam,
            'activeFilterFields' => $activeFilterFields,
            'activeFilterParam'  => $activeFilterParam,
            'dateFromParam'      => $dateFromParam,
            'dateToParam'        => $dateToParam,
            'users'              => $users,
            'pager'              => $userModel->pager,
        ]);
    }

    /**
     * Renderiza la página para modificar usuarios de acceso
     * y modifica los datos de un usuario de acceso.
     *
     * @param mixed|null $id
     */
    public function update($id = null)
    {
        // Valida si el usuario existe.
        if (session('user.id') === $id || ! $this->validateData(
            ['id' => $id],
            ['id' => 'required|is_natural_no_zero|is_not_unique[users.id]'],
        )) {
            throw PageNotFoundException::forPageNotFound();
        }

        $userModel = model('UserModel');

        // Consulta los datos del usuario.
        $user = $userModel->select('id, name, email, role_id, password')
            ->find($id);

        // Valida los campos del formulario.
        if (! $this->request->is('post') || ! $this->validate(
            [
                'name'         => 'required|max_length[128]',
                'email'        => "required|max_length[256]|valid_email|is_unique[users.email,id,{$user['id']}]",
                'role_id'      => 'required|is_natural_no_zero|is_not_unique[roles.id]',
                'password'     => 'permit_empty|min_length[8]|max_length[32]|password',
                'pass_confirm' => 'required_with[password]|matches[password]',
            ],
            [
                'password' => [
                    'password' => lang('Validation.regex_match'),
                ],
            ]
        )) {
            $roleModel = model('RoleModel');

            // Consulta todos los roles del dashboard.
            $roles = $roleModel->select('id, description')
                ->orderBy('id', 'asc')
                ->findAll();

            return view('backend/users/update', [
                'user'  => $user,
                'roles' => $roles,
            ]);
        }

        $password = $this->request->getPost('password');

        // Actualiza los datos del usuario.
        $userModel->update($user['id'], [
            'name'     => trimAll($this->request->getPost('name')),
            'email'    => lowerCase(stripAllSpaces($this->request->getPost('email'))),
            'role_id'  => $this->request->getPost('role_id'),
            'password' => $password
                ? password_hash($password, PASSWORD_DEFAULT)
                : $user['password'],
        ]);

        return redirect()
            ->route('backend.users.index')
            ->with('toast-success', 'El usuario se ha modificado correctamente');
    }

    /**
     * Alterna el estado de cuenta de un usuario de acceso.
     *
     * @param mixed|null $id
     */
    public function toggleActive($id = null)
    {
        // Valida si el usuario existe.
        if (session('user.id') === $id || ! $this->validateData(
            ['id' => $id],
            ['id' => 'required|is_natural_no_zero|is_not_unique[users.id]'],
        )) {
            throw PageNotFoundException::forPageNotFound();
        }

        $userModel = model('UserModel');

        // Consulta los datos del usuario.
        $user = $userModel->select('id, active')
            ->find($id);

        // Realiza un toggle del estado de cuenta.
        $active = ! $user['active'];

        // Actualiza el estado de cuenta.
        $userModel->update($user['id'], [
            'active' => $active,
        ]);

        return redirect()
            ->back()
            ->with('toast-success', 'El usuario de acceso se ha dado de ' . ($active ? 'alta' : 'baja') . ' correctamente');
    }

    /**
     * Elimina el registro de un usuario de acceso.
     *
     * @param mixed|null $id
     */
    public function delete($id = null)
    {
        // Valida si el usuario existe.
        if (session('user.id') === $id || ! $this->validateData(
            ['id' => $id],
            ['id' => 'required|is_natural_no_zero|is_not_unique[users.id]'],
        )) {
            throw PageNotFoundException::forPageNotFound();
        }

        $userModel = model('UserModel');

        // Elimina el registro del usuario.
        $userModel->delete($id);

        return redirect()
            ->route('backend.users.index')
            ->with('toast-success', 'El usuario de acceso se ha eliminado correctamente');
    }
}
