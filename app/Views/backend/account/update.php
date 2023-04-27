<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>
        Mi cuenta | <?= esc($user['name']) ?>
    </title>

    <meta
        name="description"
        content="Consulta o modifica los datos de tu cuenta de usuario."
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
                <?= esc($user['name']) ?>
            </h1>
            <h2 class="text-sm">
                Consulta o modifica los datos de tu cuenta de usuario.
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

    <!-- Formulario de modificación de la cuenta del usuario -->
    <?= form_open(url_to('backend.account.update')) ?>
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
                        value="<?= esc($user['name']) ?>"
                        placeholder="Escribe tu nombre completo"
                        class="input input-bordered input-primary w-full"
                    >
                    <button type="button" aria-label="Campo del nombre completo del usuario" class="btn btn-primary btn-square">
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

            <!-- Campo del email -->
            <div class="form-control w-full">
                <label for="name" class="label">
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
                        value="<?= esc($user['email']) ?>"
                        placeholder="Escribe tu email"
                        class="input input-bordered input-primary w-full"
                    >
                    <button type="button" aria-label="Campo del email del usuario" class="btn btn-primary btn-square">
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

            <!-- Campo de la contraseña -->
            <div class="form-control w-full">
                <label for="password" class="label">
                    <span class="label-text">
                        Contraseña:
                    </span>
                </label>
                <div class="input-group">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        minlength="8"
                        maxlength="32"
                        value=""
                        placeholder="Escribe su contraseña"
                        class="input input-bordered input-secondary w-full"
                    >
                    <button type="button" aria-label="Campo de la contraseña del usuario" class="btn btn-secondary btn-square">
                        <i class="ri-lock-fill text-xl"></i>
                    </button>
                </div>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('password') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo de la contraseña -->

            <!-- Campo de confirmación de contraseña -->
            <div class="form-control w-full">
                <label for="pass_confirm" class="label">
                    <span class="label-text">
                        Repetir contraseña:
                    </span>
                </label>
                <div class="input-group">
                    <input
                        type="password"
                        name="pass_confirm"
                        id="pass_confirm"
                        minlength="8"
                        maxlength="32"
                        value=""
                        placeholder="Repita su contraseña"
                        class="input input-bordered input-secondary w-full"
                    >
                    <button type="button" aria-label="Campo de confirmación de la contraseña del usuario" class="btn btn-secondary btn-square">
                        <i class="ri-lock-fill text-xl"></i>
                    </button>
                </div>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('pass_confirm') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo de confirmación de contraseña -->

            <!-- Botones de confirmación -->
            <div class="flex flex-col lg:flex-row lg:items-center justify-end gap-3">
                <label for="modal-submit" class="btn btn-primary">
                    Guardar
                </label>

                <label for="modal-confirm" class="btn btn-secondary">
                    Cancelar
                </label>
            </div>
            <!-- Fin de los botones de confirmación -->
        </div>

        <!-- Modal de submit -->
        <?= $this->setData([
            'id'      => 'modal-submit',
            'message' => '¿Deseas guardar los cambios?',
        ])->include('backend/components/modal-submit') ?>
        <!-- Fin del modal de submit -->
    <?= form_close() ?>
    <!-- Fin del formulario de modificación de la cuenta del usuario -->

    <!-- Modal de confirmación -->
    <?= $this->setData([
        'id'        => 'modal-confirm',
        'routeName' => 'backend.modules.prospects.index',
        'message'   => '¿Deseas cancelar las modificaciones de tu cuenta',
    ])->include('backend/components/modal-confirm') ?>
    <!-- Fin del modal de confirmación -->
<?= $this->endSection() ?>
