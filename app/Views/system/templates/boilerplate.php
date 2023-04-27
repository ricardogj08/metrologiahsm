<?php $lang = request()->getLocale() ?>

<!doctype html>
<html lang="<?= esc($lang) ?>">
<head>
    <!-- Plantilla base para todas las páginas del sistema -->

    <!-- Meta etiquetas generales -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="<?= esc(setting()->get('App.general', 'company')) ?>">

    <!-- Fuentes tipográficas -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
