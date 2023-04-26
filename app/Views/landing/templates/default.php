<?php $lang = request()->getLocale() ?>

<?= $this->extend('landing/templates/boilerplate') ?>

<?= $this->section('head') ?>
    <!-- Plantilla base para todas las páginas de la landing -->

    <!-- Declaración de la URL de la página web -->
    <link rel="canonical" href="<?= current_url() ?>" hreflang="<?= esc($lang) ?>">

    <!-- Favicon -->
    <link rel="icon" type="" href="<?= base_url('favicon.svg') ?>">

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
    <!-- Sección de scripts agregados de javascript -->
    <?= $this->renderSection('javascript') ?>
<?= $this->endSection() ?>
