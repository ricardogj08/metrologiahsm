<?= $this->extend('backend/templates/email') ?>

<?= $this->section('head') ?>
    <title>
        Recupera tu contraseña
    </title>

    <meta
        name="description"
        content="Recupera tu contraseña."
    >
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="text-2xl font-bold underline decoration-wavy decoration-accent underline-offset-4 mb-4">
        Recupera tu contraseña
    </h1>

    <p class="text-justify mb-4">
        ¡Hola <?= esc(word_limiter($user['name'], 1, '')) ?>!,
        presiona el siguiente botón para completar tu solicitud de recuperación de contraseña:
    </p>

    <p class="text-center mb-2">
        <a
            href="<?= url_to('backend.auth.recovery', $user['id'], $key) ?>"
            class="btn btn-primary btn-wide"
        >
            Recuperar contraseña
        </a>
    </p>

    <p class="text-center">
        <small>
            Por favor ignora este mensaje si no has realizado esta solicitud.
        </small>
    </p>
<?= $this->endSection() ?>
