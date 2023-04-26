<?= $this->extend('backend/templates/page') ?>

<?= $this->section('head') ?>
    <!-- Plantilla base para todas las páginas de autenticación del backend -->

    <!-- Sección de etiquetas agregadas al head -->
    <?= $this->renderSection('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="grid grid-cols-1 lg:grid-cols-2 lg:min-h-screen lg:bg-base-200">
        <!-- Fondo de inicio de sesión -->
        <figure class="h-24 lg:h-auto">
            <img
                src="<?= base_url(['uploads/settings/', setting()->get('App.general', 'background')]) ?>"
                alt="Fondo de inicio de sesión"
                class="w-full h-full object-cover"
            >
        </figure>
        <!-- Fin del fondo de inicio de sesión -->

        <!-- Sección del contenido agregado a la página web -->
        <main class="flex flex-col justify-center items-center">
            <div class="container max-w-xl bg-base-100 px-6 lg:px-10 py-8 lg:rounded lg:shadow-2xl">
                <!-- Logo de la empresa -->
                <div class="pb-8">
                    <a href="<?= url_to('backend.auth.login') ?>">
                        <img
                            src="<?= base_url(['uploads/settings/', setting()->get('App.general', 'logo')]) ?>"
                            alt="Logo de <?= esc(setting()->get('App.general', 'company')) ?>"
                            class="h-12 lg:h-16 w-auto object-cover m-auto lg:m-0"
                        >
                    </a>
                </div>
                <!-- Fin del logo de la empresa -->

                <?= $this->renderSection('content') ?>
            </div>
        </main>
        <!-- Fin de la sección del contenido agregado a la página web -->
    </div>
<?= $this->endSection() ?>
