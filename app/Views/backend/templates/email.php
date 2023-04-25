<?php

use CodeIgniter\I18n\Time;

$company = setting()->get('App.general', 'company');
$year    = Time::now()->getYear();
?>

<?= $this->extend('backend/templates/boilerplate') ?>

<?= $this->section('head') ?>
    <!-- Plantilla base para todos los emails -->

    <!-- Sección de etiquetas agregadas al head -->
    <?= $this->renderSection('head') ?>

    <!-- Hojas de estilo -->
    <style>
        <?= file_get_contents(FCPATH . 'css/backend.css') ?>
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="bg-base-200 flex flex-col justify-center items-center min-h-screen">
        <div class="container py-4 lg:py-8 max-w-2xl">
            <!-- Sección del contenido agregado al email -->
            <div class="bg-base-100 p-8 rounded shadow-xl">
                <!-- Logo de la empresa -->
                <div class="pb-8">
                    <a href="<?= url_to('website.pages.home') ?>" target="_blank">
                        <img
                            src="<?= base_url(['uploads/settings/', setting()->get('App.general', 'logo')]) ?>"
                            alt="Logo de <?= esc($company) ?>"
                            class="h-12 lg:h-16 w-auto object-cover"
                        >
                    </a>
                </div>
                <!-- Fin del logo de la empresa -->

                <?= $this->renderSection('content') ?>
            </div>
            <!-- Fin de la sección del contenido agregado al email -->

            <!-- Pie de página del email -->
            <div class="footer footer-center p-8 text-base-content">
                <div>
                    <p>
                        Copyright &copy <?= esc($year === '2023' ? '2023' : "2023-{$year}") ?>
                        - Todos los derechos reservados por<br>
                        <a
                            href="<?= url_to('website.pages.home') ?>"
                            target="_blank"
                            class="hover:font-medium"
                        >
                            <?= esc($company) ?>
                        </a>
                    </p>
                </div>
            </div>
            <!-- Fin del pie de página del email -->
        </div>
    </div>
<?= $this->endSection() ?>
