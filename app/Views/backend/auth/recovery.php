<?= $this->extend('backend/templates/auth') ?>

<?= $this->section('head') ?>
    <title>
        Restablece tu contraseña
    </title>

    <meta
        name="description"
        content="Ingresa tu nueva contraseña de acceso."
    >
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="text-2xl font-bold mb-2">
        Restablece tu contraseña
    </h1>

    <h2 class="text-sm mb-4">
        Ingresa tu nueva contraseña de acceso.
    </h2>

    <!-- Formulario de recuperación de contraseñas -->
    <?= form_open(url_to('backend.auth.recovery', $auth['user_id'], $key)) ?>
        <div class="flex flex-col gap-y-2">
            <!-- Campo de la nueva contraseña -->
            <div class="form-control w-full">
                <label for="password" class="label">
                    <span class="label-text">
                        Nueva contraseña:
                    </span>
                </label>
                <div class="input-group">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        minlength="8"
                        maxlength="32"
                        value=""
                        placeholder="Escribe tu nueva contraseña"
                        class="input input-bordered w-full"
                    >
                    <button type="button" aria-label="Campo de la nueva contraseña del usuario" class="btn btn-square">
                        <i class="ri-lock-fill text-xl"></i>
                    </button>
                </div>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('password') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo de la nueva contraseña -->

            <!-- Campo de confirmación de la contraseña -->
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
                        required
                        minlength="8"
                        maxlength="32"
                        value=""
                        placeholder="Repite tu contraseña"
                        class="input input-bordered w-full"
                    >
                    <button type="button" aria-label="Campo de confirmación de la contraseña del usuario" class="btn btn-square">
                        <i class="ri-lock-fill text-xl"></i>
                    </button>
                </div>
                <label class="label">
                    <span class="label-text-alt text-error">
                        <?= validation_show_error('pass_confirm') ?>
                    </span>
                </label>
            </div>
            <!-- Fin del campo de confirmación de la contraseña -->

            <!-- Botón de submit -->
            <input type="submit" value="Enviar" class="btn btn-primary mb-2">
        </div>
    <?= form_close() ?>
    <!-- Fin del formulario de recuperación de contraseñas -->
<?= $this->endSection() ?>
