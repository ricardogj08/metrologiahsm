<?php $lang = request()->getLocale() ?>

<?= $this->extend('system/templates/boilerplate') ?>

<?= $this->section('head') ?>
    <!-- Plantilla base para todas las páginas del sitio web -->

    <!-- Hojas de estilos -->
    <link rel="stylesheet" href="<?= base_url('css/website.css') ?>">

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
