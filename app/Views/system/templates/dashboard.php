<?= $this->extend('system/templates/page') ?>

<?= $this->section('head') ?>
    <!-- Plantilla base para todas las páginas del sistema -->

    <!-- Sección de etiquetas agregadas al head -->
    <?= $this->renderSection('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- Sección del contenido agregado a la página web -->
    <?= $this->renderSection('content') ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    <!-- Sección de scripts de javascript agregados -->
    <?= $this->renderSection('javascript') ?>
<?= $this->endSection() ?>
