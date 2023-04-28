<?php
use CodeIgniter\Files\File;

$lang            = request()->getLocale();
$favicon         = 'uploads/settings/' . setting()->get('App.general', 'favicon');
$faviconMimeType = (new File(FCPATH . $favicon, true))->getMimeType();
?>

<?= $this->extend('backend/templates/boilerplate') ?>

<?= $this->section('head') ?>
    <!-- Plantilla base para todas las páginas del backend que no requieren sidebar -->

    <!-- Declaración de la URL de la página web -->
    <link rel="canonical" href="<?= current_url() ?>" hreflang="<?= esc($lang) ?>">

    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="<?= base_url('css/backend.css') ?>">

    <!-- Iconos -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">

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
    <!-- Sección de scripts agregados de javascript -->
    <?= $this->renderSection('javascript') ?>
<?= $this->endSection() ?>
