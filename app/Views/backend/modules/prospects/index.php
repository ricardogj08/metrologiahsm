<?php use CodeIgniter\I18n\Time;

?>

<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>
        Módulos | Prospectos
    </title>

    <meta
        name="description"
        content="Búsqueda y consulta de todos los prospectos registrados."
    >
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <!-- Mensaje de notificación -->
    <?php if (session()->has('toast-success')): ?>
        <?= $this->setData([
            'message' => session()->getFlashdata('toast-success'),
        ])->include('backend/components/toast-success') ?>
    <?php endif ?>
    <!-- Fin del mensaje de notificación -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold underline decoration-wavy decoration-accent underline-offset-4 mb-2">
                Prospectos
            </h1>
            <h2 class="text-sm">
                Búsqueda y consulta de todos los prospectos registrados.
            </h2>
        </div>

        <div class="flex flex-col lg:flex-row lg:items-center gap-3">
            <a
                href="<?= url_to('backend.modules.prospects.create') ?>"
                class="btn btn-primary gap-2"
            >
                <i class="ri-add-circle-fill text-xl"></i>
                Registra un nuevo prospecto
            </a>

            <!-- Botón para exportar los prospectos -->
            <a
                href="<?= single_service('uri', url_to('backend.modules.prospects.download'))->setQuery($downloadParams) ?>"
                target="_blank"
                class="btn gap-2"
            >
                <i class="ri-download-cloud-fill text-xl"></i>
                Exportar
            </a>
            <!-- Fin del botón para exportar los prospectos -->
        </div>
    </div>

    <div class="divider"></div>

    <div class="pb-6 flex flex-col gap-4">
        <!-- Mensajes de error de validación -->
        <div class="text-error text-sm">
            <?= validation_list_errors() ?>
        </div>
        <!-- Fin de los mensajes de error de validación -->

        <!-- Formulario de búsqueda y consulta de resultados -->
        <?= form_open(url_to('backend.modules.prospects.index'), ['method' => 'get']) ?>
            <div class="flex flex-col lg:flex-row items-end lg:items-center justify-between gap-4">
                <!-- Campo de búsqueda -->
                <div class="form-control w-full">
                    <div class="input-group">
                        <input
                            type="text"
                            name="q"
                            maxlength="256"
                            value="<?= esc($queryParam) ?>"
                            placeholder="Buscar..."
                            class="input input-bordered w-full"
                        >

                        <!-- Botón de submit -->
                        <button
                            type="submit"
                            aria-label="Botón que realiza una búsqueda"
                            class="btn btn-primary btn-square"
                        >
                            <i class="ri-search-2-line text-xl"></i>
                        </button>
                        <!-- Fin del botón de submit -->
                    </div>
                </div>
                <!-- Fin del campo de búsqueda -->

                <!-- Botón que muestra los campos de filtrado -->
                <button
                    type="button"
                    data-collapse-toggle="filters"
                    aria-label="Botón que muestra los filtros de búsqueda y consulta"
                    class="btn btn-secondary"
                >
                    <i class="ri-filter-3-fill text-xl"></i>
                </button>
                <!-- Fin del botón que muestra los campos de filtrado -->
            </div>

            <!-- Filtros de búsqueda y consulta -->
            <div id="filters" class="hidden pt-4">
                <div class="bg-base-200 p-6 rounded-xl">
                    <div class="pb-4 grid grid-cols-1 lg:grid-cols-4 items-end gap-2">
                        <!-- Campo de filtrado de búsqueda -->
                        <div class="form-control w-full">
                            <label for="filter" class="label">
                                <span class="label-text">
                                    Filtro de búsqueda:
                                </span>
                            </label>
                            <?= form_dropdown('filter', $filterFields, $filterParam, [
                                'id'    => 'filter',
                                'class' => 'select select-bordered w-full',
                            ]) ?>
                        </div>
                        <!-- Fin del campo de filtrado de búsqueda -->

                        <!-- Campo de ordenamiento -->
                        <div class="form-control w-full">
                            <label for="sortBy" class="label">
                                <span class="label-text">
                                    Campo de ordenamiento:
                                </span>
                            </label>
                            <?= form_dropdown('sortBy', $sortByFields, $sortByParam, [
                                'id'    => 'sortBy',
                                'class' => 'select select-bordered w-full',
                            ]) ?>
                        </div>
                        <!-- Fin del campo de ordenamiento -->

                        <!-- Campo del modo de ordenamiento -->
                        <div class="form-control w-full">
                            <label for="sortOrder" class="label">
                                <span class="label-text">
                                    Modo de ordenamiento:
                                </span>
                            </label>
                            <?= form_dropdown('sortOrder', $sortOrderFields, $sortOrderParam, [
                                'id'    => 'sortOrder',
                                'class' => 'select select-bordered w-full',
                            ]) ?>
                        </div>
                        <!-- Fin del campo del modo de ordenamiento -->

                        <!-- Campo de filtrado por rating -->
                        <div class="form-control w-full">
                            <label for="rating" class="label">
                                <span class="label-text">
                                    Filtrar por rating:
                                </span>
                            </label>
                            <select name="rating" id="rating" class="select select-bordered w-full">
                                <option value="" selected>
                                    Todos
                                </option>
                                <?php foreach (range(0, 10) as $rating): ?>
                                    <option
                                        value="<?= esc($rating) ?>"
                                        <?= $rating === (int) $ratingParam && $ratingParam !== '' ? ' selected' : '' ?>
                                    >
                                        <?= esc($rating) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <!-- Fin del campo de filtrado por rating -->

                        <!-- Campo de filtrado por estado -->
                        <div class="form-control w-full">
                            <label for="state_id" class="label">
                                <span class="label-text">
                                    Filtrar por estado:
                                </span>
                            </label>
                            <select name="state_id" id="state_ids" class="select select-bordered w-full">
                                <option value="" selected>
                                    Todos
                                </option>
                                <?php foreach ($states as $state): ?>
                                    <option
                                        value="<?= esc($state['id']) ?>"
                                        <?= $state['id'] === $stateIdParam ? 'selected' : '' ?>
                                    >
                                        <?= esc($state['name']) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <!-- Fin del campo de filtrado por estado -->

                        <!-- Campo de filtrado por origen -->
                        <div class="form-control w-full">
                            <label for="origin_id" class="label">
                                <span class="label-text">
                                    Filtrar por origen:
                                </span>
                            </label>
                            <select name="origin_id" id="origin_id" class="select select-bordered w-full">
                                <option value="" selected>
                                    Todos
                                </option>
                                <?php foreach ($origins as $origin): ?>
                                    <option
                                        value="<?= esc($origin['id']) ?>"
                                        <?= $origin['id'] === $originIdParam ? 'selected' : '' ?>
                                    >
                                        <?= esc($origin['name']) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <!-- Fin del campo de filtrado por origen -->

                        <!-- Campo de filtrado por fecha desde -->
                        <div class="form-control w-full">
                            <label for="dateFrom" class="label">
                                <span class="label-text">
                                    Desde:
                                </span>
                            </label>
                            <input
                                type="date"
                                name="dateFrom"
                                id="dateFrom"
                                value="<?= esc($dateFromParam) ?>"
                                class="input input-bordered w-full"
                            >
                        </div>
                        <!-- Fin del campo de filtrado por fecha desde -->

                        <!-- Campo de filtrado por fecha hasta -->
                        <div class="form-control w-full">
                            <label for="dateTo" class="label">
                                <span class="label-text">
                                    Hasta:
                                </span>
                            </label>
                            <input
                                type="date"
                                name="dateTo"
                                id="dateTo"
                                value="<?= esc($dateToParam) ?>"
                                class="input input-bordered w-full"
                            >
                        </div>
                        <!-- Fin del campo de filtrado por fecha hasta -->
                    </div>

                    <div class="flex flex-col lg:flex-row lg:items-center justify-end gap-3">
                        <!-- Botón que aplica los filtros -->
                        <input type="submit" value="Aplicar" class="btn btn-primary">

                        <!-- Botón para restaurar los filtros -->
                        <a
                            href="<?= url_to('backend.modules.prospects.index') ?>"
                            class="btn btn-secondary"
                        >
                            Restaurar
                        </a>
                    </div>
                </div>
            </div>
            <!-- Fin de los filtros de búsqueda y consulta -->
        <?= form_close() ?>
        <!-- Fin del formulario de búsqueda y consulta de resultados -->
    </div>

    <!-- Tabla de prospectos -->
    <div class="pb-4">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Estado</th>
                        <th>Ciudad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prospects as $prospect): ?>
                        <tr class="hover">
                            <td>
                                <?= esc(Time::parse($prospect['created_at'])->toDateString()) ?>
                            </td>
                            <th>
                                <?= esc($prospect['name']) ?>
                            </th>
                            <td>
                                <?= mailto($prospect['email'], $prospect['email'], [
                                    'class' => 'link link-hover',
                                ]) ?>
                            </td>
                            <td>
                                <a
                                    href="tel:<?= esc($prospect['phone']) ?>"
                                    class="link link-hover"
                                >
                                    <?= esc($prospect['phone']) ?>
                                </a>
                            </td>
                            <td>
                                <?= esc($prospect['state']) ?>
                            </td>
                            <td>
                                <?= esc($prospect['city']) ?>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <!-- Botón para mostrar los datos del prospecto -->
                                    <a
                                        href="<?= url_to('backend.modules.prospects.show', $prospect['id']) ?>"
                                        aria-label="Botón para mostrar los datos del prospecto"
                                        class="btn btn-square btn-warning btn-outline btn-sm"
                                    >
                                        <i class="ri-eye-line text-xl"></i>
                                    </a>
                                    <!-- Fin del botón para mostrar los datos del prospecto -->

                                    <!-- Botón para editar los datos del prospecto -->
                                    <a
                                        href="<?= url_to('backend.modules.prospects.update', $prospect['id']) ?>"
                                        aria-label="Botón para editar los datos del prospecto"
                                        class="btn btn-square btn-info btn-outline btn-sm"
                                    >
                                        <i class="ri-pencil-line text-xl"></i>
                                    </a>
                                    <!-- Fin del botón para editar los datos del prospecto -->

                                    <!-- Formulario para eliminar el prospecto -->
                                    <?= form_open(url_to('backend.modules.prospects.delete', $prospect['id'])) ?>
                                        <label
                                            for="modal-submit-delete-<?= esc($prospect['id']) ?>"
                                            class="btn btn-square btn-error btn-outline btn-sm"
                                        >
                                            <i class="ri-delete-bin-5-line text-xl"></i>
                                        </label>

                                        <?= $this->setData([
                                            'id'      => "modal-submit-delete-{$prospect['id']}",
                                            'message' => '¿Deseas eliminar este prospecto?',
                                        ])->include('backend/components/modal-submit') ?>
                                    <?= form_close() ?>
                                    <!-- Fin del formulario para eliminar el prospecto -->
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Fin de la tabla de prospectos -->

    <!-- Paginación -->
    <nav class="flex justify-center lg:justify-end">
        <?= $pager->links('default', 'backend') ?>
    </nav>
    <!-- Fin de la paginación -->
<?= $this->endSection() ?>
