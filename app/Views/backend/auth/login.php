<?= $this->extend('backend/templates/auth') ?>

<?= $this->section('head') ?>
    <title>
        Inicio de sesión
    </title>

    <meta
        name="description"
        content="Ingresa tus credenciales de acceso."
    >
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="text-2xl font-bold mb-2">
        Inicio de sesión
    </h1>

    <h2 class="text-sm">
        Ingresa tus credenciales de acceso.
    </h2>

    <ul class="mb-4">
        <li>
            <small class="text-success">
                <?= esc(session()->getFlashdata('success')) ?>
            </small>
        </li>
        <li>
            <small class="text-error">
                <?= esc(session()->getFlashdata('error')) ?>
            </small>
        </li>
    </ul>

    <!-- Formulario de inicio de sesión -->
    <?= form_open(url_to('backend.auth.login')) ?>
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
                        required
                        minlength="8"
                        maxlength="32"
                        value=""
                        placeholder="Escribe tu contraseña"
                        class="input input-bordered w-full"
                    >
                    <button type="button" aria-label="Campo de la contraseña del usuario" class="btn btn-square">
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

            <!-- Botón de submit -->
            <input type="submit" value="Iniciar sesión" class="btn btn-primary mb-2">

            <a
                href="<?= url_to('backend.auth.forgotten') ?>"
                class="link link-hover text-sm text-right"
            >
                ¿Olvidaste tu contraseña?
            </a>
        </div>
    <?= form_close() ?>
    <!-- Fin del formulario de inicio de sesión -->
<?= $this->endSection() ?>
