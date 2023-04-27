<?php $lang = request()->getLocale() ?>

<?php
use CodeIgniter\Files\File;

$lang            = request()->getLocale();
$favicon         = 'uploads/settings/' . setting()->get('App.general', 'favicon');
$faviconMimeType = (new File(FCPATH . $favicon, true))->getMimeType();
?>

<?= $this->extend('system/templates/boilerplate') ?>

<?= $this->section('head') ?>
    <!-- Plantilla base para todas las páginas del sitio web -->

    <!-- Declaración de la URL de la página web -->
    <link rel="canonical" href="<?= current_url() ?>" hreflang="<?= esc($lang) ?>">

    <!-- Hojas de estilos -->
    <link rel="stylesheet" href="<?= base_url('css/website.css') ?>">

    <!-- Favicon -->
    <link rel="icon" type="<?= $faviconMimeType ?>" href="<?= base_url($favicon) ?>">

    <!-- Sección de etiquetas agregadas al head -->
    <?= $this->renderSection('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- Sección del contenido agregado a la página web -->
    <?= $this->renderSection('content') ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <!-- Sección de scripts de javascript agregados -->
    <?= $this->renderSection('javascript') ?>
<?= $this->endSection() ?>
