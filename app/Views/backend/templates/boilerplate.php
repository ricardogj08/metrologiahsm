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

    <!-- Declaración de la URL de la página web -->
    <link rel="canonical" href="<?= current_url() ?>" hreflang="<?= esc($lang) ?>">

    <!-- Sección de etiquetas agregadas al head -->
    <?= $this->renderSection('head') ?>
</head>
<body>
    <!-- Sección del contenido agregado a la página web -->
    <?= $this->renderSection('content') ?>

    <!-- Sección de scripts de javascript agregados a la página web -->
    <?= $this->renderSection('javascript') ?>
</body>
</html>
