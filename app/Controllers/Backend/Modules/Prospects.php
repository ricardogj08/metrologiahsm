<?php

namespace App\Controllers\Backend\Modules;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\I18n\Time;
use Shuchkin\SimpleXLSXGen;

class Prospects extends BaseController
{
    /**
     * Renderiza la página de todos los prospectos.
     */
    public function index()
    {
        // Define los campos de filtrado de resultados.
        $filterFields = [
            'name'  => 'Nombre',
            'email' => 'Email',
            'phone' => 'Teléfono',
            'city'  => 'Ciudad',
        ];

        $filterList = implode(',', array_keys($filterFields));

        // Define los campos de ordenamiento de resultados.
        $sortByFields = [
            'created_at' => 'Fecha de registro',
            'name'       => 'Nombre',
            'rating'     => 'Rating',
        ];

        $sortByList = implode(',', array_keys($sortByFields));

        // Define los modos de ordenamiento de resultados.
        $sortOrderFields = [
            'asc'  => 'Ascendente',
            'desc' => 'Descendente',
        ];

        $sortOrderList = implode(',', array_keys($sortOrderFields));

        // Valida los parámetros de búsqueda y consulta de resultados.
        if (! $this->validate([
            'q'         => 'if_exist|max_length[256]',
            'filter'    => "permit_empty|in_list[{$filterList}]",
            'sortBy'    => "permit_empty|in_list[{$sortByList}]",
            'sortOrder' => "permit_empty|in_list[{$sortOrderList}]",
            'rating'    => 'permit_empty|is_natural|less_than_equal_to[10]',
            'state_id'  => 'permit_empty|is_natural_no_zero|is_not_unique[states.id]',
            'origin_id' => 'permit_empty|is_natural_no_zero|is_not_unique[origins.id]',
            'dateFrom'  => 'permit_empty|valid_date[Y-m-d]',
            'dateTo'    => 'permit_empty|valid_date[Y-m-d]',
        ])) {
            return redirect()
                ->route('backend.modules.prospects.index')
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

        // Obtiene el campo de filtrado por rating (por defecto: '').
        $ratingParam = stripAllSpaces($this->request->getGet('rating'));

        // Obtiene el campo de filtrado por estado (por defecto: '').
        $stateIdParam = $this->request->getGet('state_id');

        // Obtiene el campo de filtrado por origen (por defecto: '').
        $originIdParam = $this->request->getGet('origin_id');

        // Obtiene el campo de filtrado por fecha desde (por defecto: '').
        $dateFromParam = stripAllSpaces($this->request->getGet('dateFrom'));

        // Obtiene el campo de filtrado por fecha hasta (por defecto: '').
        $dateToParam = stripAllSpaces($this->request->getGet('dateTo'));

        $prospectModel = model('ProspectModel');

        // Define los campos a seleccionar.
        $builder = $prospectModel->select('prospects.id, prospects.name, prospects.phone, prospects.email, states.name as state, prospects.city, prospects.created_at')
            ->state();

        // Filtra los resultados por rating.
        if ($ratingParam) {
            $builder->where('prospects.rating', $ratingParam);
        }

        // Filtra por estado.
        if ($stateIdParam) {
            $builder->where('prospects.state_id', $stateIdParam);
        }

        // Filtra por origen.
        if ($originIdParam) {
            $builder->where('prospects.origin_id', $originIdParam);
        }

        // Filtra los resultados por fecha desde.
        if ($dateFromParam) {
            $builder->where('prospects.created_at >=', Time::parse($dateFromParam)->toDateTimeString());
        }

        // Filtra los resultados por fecha hasta.
        if ($dateToParam) {
            $builder->where('prospects.created_at <', Time::parse('+1 day ' . $dateToParam)->toDateTimeString());
        }

        /**
         * Consulta todos los prospectos
         * que coinciden con el patrón de búsqueda
         * con paginación.
         */
        $prospects = $builder
            ->like('prospects.' . $filterParam, $queryParam)
            ->orderBy('prospects.' . $sortByParam, $sortOrderParam)
            ->paginate(8);

        $stateModel = model('StateModel');

        // Consulta todos los estados.
        $states = $stateModel->orderBy('name', 'asc')
            ->findAll();

        $originModel = model('OriginModel');

        // Consulta todos los orígenes.
        $origins = $originModel->orderBy('id', 'asc')
            ->findAll();

        return view('backend/modules/prospects/index', [
            'queryParam'      => $queryParam,
            'filterFields'    => $filterFields,
            'filterParam'     => $filterParam,
            'sortByFields'    => $sortByFields,
            'sortByParam'     => $sortByParam,
            'sortOrderFields' => $sortOrderFields,
            'sortOrderParam'  => $sortOrderParam,
            'ratingParam'     => $ratingParam,
            'stateIdParam'    => $stateIdParam,
            'states'          => $states,
            'originIdParam'   => $originIdParam,
            'origins'         => $origins,
            'dateFromParam'   => $dateFromParam,
            'dateToParam'     => $dateToParam,
            'prospects'       => $prospects,
            'pager'           => $prospectModel->pager,
            'downloadParams'  => $this->request->getUri()->getQuery(),
        ]);
    }

    /**
     * Descarga la información de los prospectos en formato excel.
     */
    public function download()
    {
        // Valida los parámetros de búsqueda y consulta de resultados.
        if (! $this->validate([
            'q'         => 'if_exist|max_length[256]',
            'filter'    => 'permit_empty|in_list[name,email,phone,city]',
            'sortBy'    => 'permit_empty|in_list[created_at,name,rating]',
            'sortOrder' => 'permit_empty|in_list[asc,desc]',
            'rating'    => 'permit_empty|is_natural|less_than_equal_to[10]',
            'state_id'  => 'permit_empty|is_natural_no_zero|is_not_unique[states.id]',
            'origin_id' => 'permit_empty|is_natural_no_zero|is_not_unique[origins.id]',
            'dateFrom'  => 'permit_empty|valid_date[Y-m-d]',
            'dateTo'    => 'permit_empty|valid_date[Y-m-d]',
        ])) {
            return redirect()
                ->route('backend.modules.prospects.index')
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

        // Obtiene el campo de filtrado por rating (por defecto: '').
        $ratingParam = stripAllSpaces($this->request->getGet('rating'));

        // Obtiene el campo de filtrado por estado (por defecto: '').
        $stateIdParam = $this->request->getGet('state_id');

        // Obtiene el campo de filtrado por origen (por defecto: '').
        $originIdParam = $this->request->getGet('origin_id');

        // Obtiene el campo de filtrado por fecha desde (por defecto: '').
        $dateFromParam = stripAllSpaces($this->request->getGet('dateFrom'));

        // Obtiene el campo de filtrado por fecha hasta (por defecto: '').
        $dateToParam = stripAllSpaces($this->request->getGet('dateTo'));

        $prospectModel = model('ProspectModel');

        // Define los campos a seleccionar.
        $builder = $prospectModel->select('prospects.created_at, prospects.name, prospects.company, prospects.phone, prospects.email, states.name as state, prospects.city, origins.name as origin, prospects.message, prospects.rating, prospects.observations')
            ->state()
            ->origin();

        // Filtra los resultados por rating.
        if ($ratingParam) {
            $builder->where('prospects.rating', $ratingParam);
        }

        // Filtra por estado.
        if ($stateIdParam) {
            $builder->where('prospects.state_id', $stateIdParam);
        }

        // Filtra por origen.
        if ($originIdParam) {
            $builder->where('prospects.origin_id', $originIdParam);
        }

        // Filtra los resultados por fecha desde.
        if ($dateFromParam) {
            $builder->where('prospects.created_at >=', Time::parse($dateFromParam)->toDateTimeString());
        }

        // Filtra los resultados por fecha hasta.
        if ($dateToParam) {
            $builder->where('prospects.created_at <', Time::parse('+1 day ' . $dateToParam)->toDateTimeString());
        }

        /**
         * Consulta todos los prospectos
         * que coinciden con el patrón de búsqueda.
         */
        $prospects = $builder
            ->like('prospects.' . $filterParam, $queryParam)
            ->orderBy('prospects.' . $sortByParam, $sortOrderParam)
            ->findAll();

        // Define los encabezados del excel.
        $data = [
            [
                '<center><b>Fecha</b></center>',
                '<center><b>Nombre</b></center>',
                '<center><b>Empresa</b></center>',
                '<center><b>Teléfono</b></center>',
                '<center><b>Email</b></center>',
                '<center><b>Estado</b></center>',
                '<center><b>Ciudad</b></center>',
                '<center><b>Origen</b></center>',
                '<center><b>Mensaje</b></center>',
                '<center><b>Rating</b></center>',
                '<center><b>Observaciones</b></center>',
            ],
        ];

        foreach ($prospects as $prospect) {
            $data[] = [
                $prospect['created_at'],
                "\0" . $prospect['name'],
                "\0" . $prospect['company'],
                "\0" . $prospect['phone'],
                $prospect['email'],
                "\0" . $prospect['city'],
                "\0" . $prospect['state'],
                "\0" . $prospect['origin'],
                "\0" . $prospect['message'],
                $prospect['rating'],
                "\0" . $prospect['observations'],
            ];
        }

        // Genera el excel.
        SimpleXLSXGen::fromArray($data)
            ->downloadAs('prospectos-' . url_title(Time::now()->toDateTimeString()) . '.xlsx');
    }

    /**
     * Renderiza la página de los datos de un prospecto.
     *
     * @param mixed|null $id
     */
    public function show($id = null)
    {
        // Valida si el prospecto existe.
        if (! $this->validateData(
            ['id' => $id],
            ['id' => 'required|is_natural_no_zero|is_not_unique[prospects.id]'],
        )) {
            throw PageNotFoundException::forPageNotFound();
        }

        $prospectModel = model('ProspectModel');

        // Consulta los datos del prospecto.
        $prospect = $prospectModel->select('prospects.id, prospects.name, prospects.company, prospects.phone, prospects.email, states.name as state, prospects.city, origins.name as origin, prospects.message, prospects.rating, prospects.observations, prospects.created_at, prospects.updated_at')
            ->state()
            ->origin()
            ->find($id);

        return view('backend/modules/prospects/show', [
            'prospect' => $prospect,
        ]);
    }

    /**
     * Renderiza la página para modificar prospectos
     * y modifica los datos de un prospecto.
     *
     * @param mixed|null $id
     */
    public function update($id = null)
    {
        // Valida si el prospecto existe.
        if (! $this->validateData(
            ['id' => $id],
            ['id' => 'required|is_natural_no_zero|is_not_unique[prospects.id]'],
        )) {
            throw PageNotFoundException::forPageNotFound();
        }

        $prospectModel = model('ProspectModel');

        // Valida los campos del formulario.
        if (! $this->request->is('post') || ! $this->validate([
            'name'         => 'required|max_length[128]',
            'company'      => 'required|max_length[128]',
            'phone'        => 'required|max_length[15]|numeric',
            'email'        => 'required|max_length[256]|valid_email',
            'state_id'     => 'required|is_natural_no_zero|is_not_unique[states.id]',
            'city'         => 'required|max_length[128]',
            'origin_id'    => 'required|is_natural_no_zero|is_not_unique[origins.id]',
            'message'      => 'required|max_length[4096]',
            'rating'       => 'required|is_natural|less_than_equal_to[10]',
            'observations' => 'if_exist|max_length[4096]',
        ])) {
            // Consulta los datos del prospecto.
            $prospect = $prospectModel->select('id, name, company, phone, email, city, state_id, origin_id, message, rating, observations')
                ->find($id);

            $stateModel = model('StateModel');

            // Consulta todos los estados.
            $states = $stateModel->orderBy('name', 'asc')
                ->findAll();

            $originModel = model('OriginModel');

            // Consulta todos los orígenes.
            $origins = $originModel->orderBy('id', 'asc')
                ->findAll();

            return view('backend/modules/prospects/update', [
                'prospect' => $prospect,
                'states'   => $states,
                'origins'  => $origins,
            ]);
        }

        // Actualiza los datos del prospecto.
        $prospectModel->update($id, [
            'name'         => trimAll($this->request->getPost('name')),
            'company'      => trimAll($this->request->getPost('company')),
            'phone'        => stripAllSpaces($this->request->getPost('phone')),
            'email'        => lowerCase(stripAllSpaces($this->request->getPost('email'))),
            'state_id'     => $this->request->getPost('state_id'),
            'city'         => trimAll($this->request->getPost('city')),
            'origin_id'    => $this->request->getPost('origin_id'),
            'message'      => trimAll($this->request->getPost('message')),
            'rating'       => stripAllSpaces($this->request->getPost('rating')),
            'observations' => trimAll($this->request->getPost('observations')) ?: null,
        ]);

        return redirect()
            ->route('backend.modules.prospects.index')
            ->with('toast-success', 'El prospecto se ha modificado correctamente');
    }

    /**
     * Elimina el registro de un prospecto.
     *
     * @param mixed|null $id
     */
    public function delete($id = null)
    {
        // Valida si el prospecto existe.
        if (! $this->validateData(
            ['id' => $id],
            ['id' => 'required|is_natural_no_zero|is_not_unique[prospects.id]'],
        )) {
            throw PageNotFoundException::forPageNotFound();
        }

        $prospectModel = model('ProspectModel');

        // Elimina el registro del prospecto.
        $prospectModel->delete($id);

        return redirect()
            ->route('backend.modules.prospects.index')
            ->with('toast-success', 'El prospecto se ha eliminado correctamente');
    }

    /**
     * Renderiza la página de registro de prospectos
     * y registra un nuevo prospecto.
     */
    public function create()
    {
        // Valida los campos del formulario.
        if (! $this->request->is('post') || ! $this->validate([
            'name'         => 'required|max_length[128]',
            'company'      => 'required|max_length[128]',
            'phone'        => 'required|max_length[15]|numeric',
            'email'        => 'required|max_length[256]|valid_email',
            'state_id'     => 'required|is_natural_no_zero|is_not_unique[states.id]',
            'city'         => 'required|max_length[128]',
            'origin_id'    => 'required|is_natural_no_zero|is_not_unique[origins.id]',
            'message'      => 'required|max_length[4096]',
            'rating'       => 'required|is_natural|less_than_equal_to[10]',
            'observations' => 'if_exist|max_length[4096]',
        ])) {
            $stateModel = model('StateModel');

            // Consulta todos los estados.
            $states = $stateModel->orderBy('name', 'asc')
                ->findAll();

            $originModel = model('OriginModel');

            // Consulta todos los orígenes.
            $origins = $originModel->orderBy('id', 'asc')
                ->findAll();

            return view('backend/modules/prospects/create', [
                'states'  => $states,
                'origins' => $origins,
            ]);
        }

        $prospectModel = model('ProspectModel');

        // Registra los datos del prospecto.
        $prospectModel->insert([
            'name'         => trimAll($this->request->getPost('name')),
            'company'      => trimAll($this->request->getPost('company')),
            'phone'        => stripAllSpaces($this->request->getPost('phone')),
            'email'        => lowerCase(stripAllSpaces($this->request->getPost('email'))),
            'state_id'     => $this->request->getPost('state_id'),
            'city'         => trimAll($this->request->getPost('city')),
            'origin_id'    => $this->request->getPost('origin_id'),
            'message'      => trimAll($this->request->getPost('message')),
            'rating'       => stripAllSpaces($this->request->getPost('rating')),
            'observations' => trimAll($this->request->getPost('observations')) ?: null,
        ]);

        return redirect()
            ->route('backend.modules.prospects.index')
            ->with('toast-success', 'El prospecto se ha registrado correctamente');
    }
}
