<?php
$lang       = request()->getLocale();
$tagManager = setting()->get('App.apps', 'google:tagManager');
$company    = setting()->get('App.general', 'company');
?>

<?= $this->extend('website/templates/default') ?>

<?= $this->section('head') ?>
    <!-- Plantilla base para todas las páginas del sitio web que requieren Google Tag Manager -->

    <!-- Google Tag Manager -->
    <?php if (ENVIRONMENT === 'production'): ?>
        <script>
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != "dataLayer" ? "&l=" + l : "";
                j.async = true;
                j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, "script", "dataLayer", "<?= esc($tagManager, 'js') ?>");
        </script>
    <?php endif ?>
    <!-- End Google Tag Manager -->

    <meta name="robots" content="index, follow">

    <!-- Meta etiquetas generales de Open Graph -->
    <meta property="og:site_name" content="<?= esc($company) ?>">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:locale" content="<?= esc($lang) ?>">

    <!-- Meta etiquetas generales de Twitter -->
    <meta name="twitter:card" content="summary">

    <!-- Meta etiquetas generales de geolocalización -->
    <meta name="geo.position" content="">
    <meta name="geo.region" content="">
    <meta name="geo.placename" content="">
    <meta name="ICBM" content="">

    <!-- Meta etiquetas generales de Dublin Core -->
    <meta name="DC.Identifier" content="<?= current_url() ?>">
    <meta name="DC.Format" content="text/html">
    <meta name="DC.Language" content="<?= esc($lang) ?>">
    <meta name="DC.Creator" content="<?= esc($company) ?>">
    <meta name="DC.Coverage" content="">

    <!-- Sección de etiquetas agregadas al head -->
    <?= $this->renderSection('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- Google Tag Manager (noscript) -->
    <?php if (ENVIRONMENT === 'production'): ?>
        <noscript>
            <iframe
                src="https://www.googletagmanager.com/ns.html?id=<?= esc($tagManager, 'url') ?>"
                height="0"
                width="0"
                style="display: none; visibility: hidden;">
            </iframe>
        </noscript>
    <?php endif ?>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Header -->
    <?= $this->include('website/components/Header') ?>

    <!-- Sección del contenido agregado a la página web -->
    <?= $this->renderSection('content') ?>

    <!-- Footer -->
    <?= $this->include('website/components/Footer') ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <!-- Sección de scripts agregados de javascript -->
    <?= $this->renderSection('javascript') ?>
<?= $this->endSection() ?>
