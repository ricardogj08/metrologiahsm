<?php
$lang  = request()->getLocale();
$theme = setting()->get('App.general', 'theme');
?>

<!doctype html>
<html lang="<?= esc($lang) ?>" data-theme="<?= esc($theme) ?>">
<head>
    <!-- Plantilla base para todas las páginas del backend -->

    <!-- Meta etiquetas generales -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="<?= esc(setting()->get('App.general', 'company')) ?>">

    <!-- Sección de etiquetas agregadas al head -->
    <?= $this->renderSection('head') ?>
</head>
<body>
    <!-- Sección del contenido agregado a la página web -->
    <?= $this->renderSection('content') ?>

    <!-- Sección de scripts agregados de javascript -->
    <?= $this->renderSection('javascript') ?>
</body>
</html>
