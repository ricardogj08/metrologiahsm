<?= $this->extend('system/templates/page') ?>

<?= $this->section('head') ?>
    <!-- Plantilla base para todas las páginas de autenticación del sistema -->

    <!-- Sección de etiquetas agregadas al head -->
    <?= $this->renderSection('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div
        style="background-image: url('<?= base_url('images/system/auth/background.webp') ?>');"
        class="bg-cover bg-no-repeat bg-center min-h-screen flex flex-col justify-center items-center"
    >
        <main class="container">
            <div class="bg-white rounded-xl shadow-md container pt-14 lg:pt-28 px-12 pb-11 max-w-sm relative">
                <!-- Sección del contenido agregado a la página web -->
                <?= $this->renderSection('content') ?>
            </div>
        </main>
    </div>
<?= $this->endSection() ?>
