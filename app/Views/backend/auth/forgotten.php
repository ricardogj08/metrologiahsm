<?= $this->extend('backend/templates/auth') ?>

<?= $this->section('head') ?>
    <title>
        Recupera tu contraseña
    </title>

    <meta
        name="description"
        content="Ingresa tu email de acceso."
    >
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="text-2xl font-bold mb-2">
        Recupera tu contraseña
    </h1>

    <h2 class="text-sm">
        Ingresa tu email de acceso.
    </h2>

    <p class="text-error mb-4">
        <small>
            <?= esc(session()->getFlashdata('error')) ?>
        </small>
    </p>

    <!-- Formulario de recuperación de contraseñas -->
    <?= form_open(url_to('backend.auth.forgotten')) ?>
        <div class="flex flex-col gap-y-2">
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
                        placeholder="Escribe tu email"
                        class="input input-bordered w-full"
                    >
                    <button type="button" aria-label="Campo del email del usuario" class="btn btn-square">
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

            <!-- Botones de confirmación -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                <!-- Botón de submit -->
                <input type="submit" value="Recuperar" class="btn btn-primary">

                <a href="<?= url_to('backend.auth.login') ?>" class="btn btn-secondary">
                    Volver
                </a>
            </div>
            <!-- Fin de los botones de confirmación -->
        </div>
    <?= form_close() ?>
    <!-- Fin del formulario de recuperación de contraseñas -->
<?= $this->endSection() ?>
