<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>
        Prospectos | <?= esc($prospect['name']) ?>
    </title>

    <meta
        name="description"
        content="Información y datos del prospecto."
    >
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold underline decoration-wavy decoration-accent underline-offset-4 mb-2">
                <?= esc($prospect['name']) ?>
            </h1>
            <h2 class="text-sm">
                Información y datos del prospecto.
            </h2>
        </div>

        <!-- Botón de retroceso -->
        <a
            href="<?= url_to('backend.modules.prospects.index') ?>"
            class="btn gap-2"
        >
            <i class="ri-arrow-left-circle-line text-xl"></i>
            Volver
        </a>
        <!-- Fin del botón de retroceso -->
    </div>

    <div class="divider"></div>

    <!-- Tabla de datos del prospecto -->
    <div class="pb-4">
        <div class="overflow-x-auto">
            <table class="table table-compact table-zebra w-full">
                <tr>
                    <th>
                        Nombre completo:
                    </th>
                    <td>
                        <?= esc($prospect['name']) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Empresa:
                    </th>
                    <td>
                        <?= esc($prospect['company']) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Teléfono:
                    </th>
                    <td>
                        <a
                            href="tel:<?= esc($prospect['phone']) ?>"
                            class="link link-hover"
                        >
                            <?= esc($prospect['phone']) ?>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>
                        Email:
                    </th>
                    <td>
                        <?= mailto($prospect['email'], $prospect['email'], [
                            'class' => 'link link-hover',
                        ]) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Estado:
                    </th>
                    <td>
                        <?= esc($prospect['state']) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Ciudad:
                    </th>
                    <td>
                        <?= esc($prospect['city']) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Origen:
                    </th>
                    <td>
                        <?= esc($prospect['origin']) ?>
                    </td>
                </tr>
                <tr>
                    <th class="align-top">
                        Mensaje:
                    </th>
                    <td class="whitespace-normal">
                        <?= esc($prospect['message']) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Rating:
                    </th>
                    <td>
                        <div class="flex items-center gap-x-2">
                            <div class="font-bold">
                                <?= esc(number_format($prospect['rating'], 1)) ?>
                            </div>
                            <div class="rating rating-half">
                                <?php foreach (range(0, 10) as $rating): ?>
                                    <input
                                        type="radio"
                                        name="rating"
                                        value=""
                                        aria-label="Rating de <?= esc($rating) ?>"
                                        disabled
                                        class="<?= $rating
                                            ? ($rating % 2
                                                ? 'mask mask-star-2 bg-orange-400 mask-half-1'
                                                : 'mask mask-star-2 bg-orange-400 mask-half-2 mr-2')
                                            : 'rating-hidden' ?>"
                                        <?= (int) $prospect['rating'] === $rating ? 'checked' : '' ?>
                                    >
                                <?php endforeach ?>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="align-top">
                        Observaciones:
                    </th>
                    <td class="whitespace-normal">
                        <?= esc($prospect['observations']) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Fecha de registro:
                    </th>
                    <td>
                        <?= esc(format_date_humanize($prospect['created_at'])) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Fecha de modificación:
                    </th>
                    <td>
                        <?= esc(format_date_humanize($prospect['updated_at'])) ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <!-- Fin de la tabla de datos del prospecto -->

    <div class="flex flex-col lg:flex-row lg:items-center justify-end gap-3">
        <!-- Formulario para eliminar el prospecto -->
        <?= form_open(url_to('backend.modules.prospects.delete', $prospect['id'])) ?>
            <label
                for="modal-submit"
                class="btn btn-error btn-outline w-full"
            >
                Eliminar
            </label>

            <?= $this->setData([
                'id'      => 'modal-submit',
                'message' => '¿Deseas eliminar este prospecto?',
            ])->include('backend/components/modal-submit') ?>
        <?= form_close() ?>
        <!-- Fin del formulario para eliminar el prospecto -->

        <!-- Botón para editar los datos del prospecto -->
        <a
            href="<?= url_to('backend.modules.prospects.update', $prospect['id']) ?>"
            class="btn btn-info btn-outline"
        >
            Modificar
        </a>
        <!-- Fin del botón para editar los datos del prospecto -->
    </div>
<?= $this->endSection() ?>
