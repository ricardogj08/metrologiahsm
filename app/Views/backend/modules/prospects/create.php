<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>
        Prospecto | Nuevo
    </title>

    <meta
        name="description"
        content="Ingresa los datos de registro del nuevo prospecto."
    >
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold underline decoration-wavy decoration-accent underline-offset-4 mb-2">
                Registra un nuevo prospecto
            </h1>
            <h2 class="text-sm">
                Ingresa los datos de registro del nuevo prospecto.
            </h2>
        </div>

        <!-- Botón de retroceso -->
        <label for="modal-confirm" class="btn gap-2">
            <i class="ri-arrow-left-circle-line text-xl"></i>
            Volver
        </label>
        <!-- Fin del botón de retroceso -->
    </div>

    <div class="divider"></div>

    <!-- Formulario de registro del prospecto -->
    <?= form_open(url_to('backend.modules.prospects.create')) ?>
        <div class="flex flex-col gap-y-2">
            <!-- Campo del nombre -->
            <div class="form-control w-full">
                <label for="name" class="label">
                    <span class="label-text">
                        Nombre completo:
                    </span>
                </label>
                <div class="input-group">
                    <input
                        type="text"
                        name="name"
                        id="name"
                        required
                        maxlength="128"
                        value="<?= set_value('name') ?>"
                        placeholder="Escribe su nombre completo"
                        class="input input-bordered input-primary w-full"
                    >
                    <button type="button" aria-label="Campo del nombre del prospecto" class="btn btn-primary btn-square">
                        <i class="ri-user-3-fill text-xl"></i>
                    </button>
                </div>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('name') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo del nombre -->

            <!-- Campo de la empresa -->
            <div class="form-control w-full">
                <label for="company" class="label">
                    <span class="label-text">
                        Empresa:
                    </span>
                </label>
                <div class="input-group">
                    <input
                        type="text"
                        name="company"
                        id="company"
                        required
                        maxlength="128"
                        value="<?= set_value('company') ?>"
                        placeholder="Escribe su empresa"
                        class="input input-bordered input-primary w-full"
                    >
                    <button type="button" aria-label="Campo de la empresa del prospecto" class="btn btn-primary btn-square">
                        <i class="ri-briefcase-2-fill text-xl"></i>
                    </button>
                </div>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('company') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo de la empresa -->

            <!-- Campo del teléfono -->
            <div class="form-control w-full">
                <label for="phone" class="label">
                    <span class="label-text">
                        Teléfono:
                    </span>
                </label>
                <div class="input-group">
                    <input
                        type="tel"
                        name="phone"
                        id="phone"
                        required
                        maxlength="15"
                        pattern="[0-9]{1,15}"
                        value="<?= set_value('phone') ?>"
                        placeholder="Escribe su teléfono"
                        class="input input-bordered input-primary w-full"
                    >
                    <button type="button" aria-label="Campo del teléfono del prospecto" class="btn btn-primary btn-square">
                        <i class="ri-phone-fill text-xl"></i>
                    </button>
                </div>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('phone') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo del teléfono -->

            <!-- Campo del email -->
            <div class="form-control w-full">
                <label for="email" class="label">
                    <span class="label-text">
                        Email:
                    </span>
                </label>
                <div class="input-group">
                    <input
                        type="email"
                        name="email"
                        id="email"
                        required
                        maxlength="256"
                        value="<?= set_value('email') ?>"
                        placeholder="Escribe su email"
                        class="input input-bordered input-primary w-full"
                    >
                    <button type="button" aria-label="Campo del email del prospecto" class="btn btn-primary btn-square">
                        <i class="ri-mail-fill text-xl"></i>
                    </button>
                </div>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('email') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo del email -->

            <!-- Campo del estado -->
            <div class="form-control w-full">
                <label for="state_id" class="label">
                    <span class="label-text">
                        Estado:
                    </span>
                </label>
                <select name="state_id" id="state_id" required class="select select-bordered select-primary w-full">
                    <?php foreach ($states as $state): ?>
                        <option
                            value="<?= esc($state['id']) ?>"
                            <?= set_select('state_id', $state['id']) ?>
                        >
                            <?= esc($state['name']) ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('state_id') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del estado -->

            <!-- Campo de la ciudad -->
            <div class="form-control w-full">
                <label for="city" class="label">
                    <span class="label-text">
                        Ciudad:
                    </span>
                </label>
                <div class="input-group">
                    <input
                        type="text"
                        name="city"
                        id="city"
                        required
                        maxlength="128"
                        value="<?= set_value('city') ?>"
                        placeholder="Escribe su ciudad"
                        class="input input-bordered input-primary w-full"
                    >
                    <button type="button" aria-label="Campo de la ciudad del prospecto" class="btn btn-primary btn-square">
                        <i class="ri-community-fill text-xl"></i>
                    </button>
                </div>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('city') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo de la ciudad -->

            <!-- Campo del origen -->
            <div class="form-control w-full">
                <label for="origin_id" class="label">
                    <span class="label-text">
                        Origen:
                    </span>
                </label>
                <select name="origin_id" id="origin_id" required class="select select-bordered select-primary w-full">
                    <?php foreach ($origins as $origin): ?>
                        <option
                            value="<?= esc($origin['id']) ?>"
                            <?= set_select('origin_id', $origin['id']) ?>
                        >
                            <?= esc($origin['name']) ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('origin_id') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del origen -->

            <!-- Campo del mensaje -->
            <div class="form-control w-full">
                <label for="message" class="label">
                    <span class="label-text">
                        Mensaje:
                    </span>
                </label>
                <textarea
                    name="message"
                    id="message"
                    maxlength="4096"
                    required
                    class="textarea textarea-bordered textarea-primary h-32 w-full"
                    placeholder="Escribe el mensaje del prospecto..."
                ><?= set_value('message') ?></textarea>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('message') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo del mensaje -->

            <!-- Campo del rating -->
            <div class="form-control w-full">
                <label for="rating" class="label">
                    <span class="label-text">
                        Rating <span class="italic">(opcional)</span>:
                    </span>
                </label>
                <div class="flex items-center gap-x-2">
                    <div class="font-semibold text-2xl">
                        <?= esc(number_format(set_value('rating', 0), 1)) ?>
                    </div>
                    <div class="rating rating-half rating-lg">
                        <?php foreach (range(0, 10) as $rating): ?>
                            <input
                                type="radio"
                                name="rating"
                                id="rating"
                                required
                                value="<?= esc($rating) ?>"
                                aria-label="Rating de <?= esc($rating) ?>"
                                class="<?= $rating
                                    ? ($rating % 2
                                        ? 'mask mask-star-2 bg-orange-400 mask-half-1'
                                        : 'mask mask-star-2 bg-orange-400 mask-half-2 mr-2')
                                    : 'rating-hidden' ?>"
                                <?= set_radio('rating', $rating, $rating === 0) ?>
                            >
                        <?php endforeach ?>
                    </div>
                </div>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('rating') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo del rating -->

            <!-- Campo de las observaciones -->
            <div class="form-control w-full">
                <label for="observations" class="label">
                    <span class="label-text">
                        Observaciones <span class="italic">(opcional)</span>:
                    </span>
                </label>
                <textarea
                    name="observations"
                    id="observations"
                    maxlength="4096"
                    class="textarea textarea-bordered textarea-secondary h-32 w-full"
                    placeholder="Escribe una nota para el prospecto..."
                ><?= set_value('observations') ?></textarea>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('observations') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo de las observaciones -->

            <!-- Botones de confirmación -->
            <div class="flex flex-col lg:flex-row lg:items-center justify-end gap-3">
                <!-- Botón de submit -->
                <input type="submit" value="Guardar" class="btn btn-primary">

                <label for="modal-confirm" class="btn btn-secondary">
                    Cancelar
                </label>
            </div>
            <!-- Fin de los botones de confirmación -->
        </div>
    <?= form_close() ?>
    <!-- Fin del formulario de registro del prospecto -->

    <!-- Modal de confirmación -->
    <?= $this->setData([
        'id'        => 'modal-confirm',
        'routeName' => 'backend.modules.prospects.index',
        'message'   => '¿Deseas cancelar el registro del nuevo prospecto?',
    ])->include('backend/components/modal-confirm') ?>
    <!-- Fin del modal de confirmación -->
<?= $this->endSection() ?>
