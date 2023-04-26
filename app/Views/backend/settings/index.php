<?= $this->extend('backend/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>
        General | Configuraciones
    </title>

    <meta
        name="description"
        content="Consulta todas las configuraciones del sitio web."
    >
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <!-- Mensaje de notificación -->
    <?php if (session()->has('toast-success')): ?>
        <?= $this->setData([
            'message' => session()->getFlashdata('toast-success'),
        ])->include('backend/components/toast-success') ?>
    <?php endif ?>
    <!-- Fin del mensaje de notificación -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold underline decoration-wavy decoration-accent underline-offset-4 mb-2">
                Configuraciones
            </h1>
            <p class="text-sm">
                Consulta todas las configuraciones del sitio web.
            </p>
        </div>

        <!-- Botón para modificar las configuraciones del sitio web -->
        <a
            href="<?= url_to('backend.settings.update') ?>"
            class="btn btn-primary gap-2"
        >
            <i class="ri-pencil-fill text-xl"></i>
            Modificar
        </a>
        <!-- Fin del botón para modificar las configuraciones del sitio web -->
    </div>

    <div class="divider"></div>

    <!-- Tabla de configuraciones generales -->
    <section>
        <h2 class="text-xl font-bold underline decoration-wavy decoration-secondary underline-offset-4 mb-4">
            General
        </h2>

        <div class="overflow-x-auto">
            <table class="table table-compact table-zebra w-full">
                <thead>
                    <tr>
                        <th>Configuración</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            Empresa:
                        </th>
                        <td>
                            <?= esc(setting()->get('App.general', 'company')) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Teléfonos:
                        </th>
                        <td>
                            <?= esc(setting()->get('App.general', 'phones')) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tema:
                        </th>
                        <td>
                            <?= esc(setting()->get('App.general', 'theme')) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Favicon:
                        </th>
                        <td>
                            <img
                                src="<?= base_url(['uploads/settings/', setting()->get('App.general', 'favicon')]) ?>"
                                alt="Favicon de <?= esc(setting()->get('App.general', 'company')) ?>"
                                class="h-8 w-auto object-cover"
                            >
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Fondo:
                        </th>
                        <td>
                            <img
                                src="<?= base_url(['uploads/settings/', setting()->get('App.general', 'background')]) ?>"
                                alt="Fondo de inicio de sesión"
                                class="h-8 w-auto object-cover"
                            >
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Logo:
                        </th>
                        <td>
                            <img
                                src="<?= base_url(['uploads/settings/', setting()->get('App.general', 'logo')]) ?>"
                                alt="Logo de <?= esc(setting()->get('App.general', 'company')) ?>"
                                class="h-8 w-auto object-cover"
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <!-- Fin de la tabla de configuraciones generales -->

    <div class="divider"></div>

    <!-- Tabla de configuraciones de emails -->
    <section>
        <h2 class="text-xl font-bold underline decoration-wavy decoration-secondary underline-offset-4 mb-4">
            Emails
        </h2>

        <div class="overflow-x-auto">
            <table class="table table-compact table-zebra w-full">
                <thead>
                    <tr>
                        <th>Configuración</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            Remitente:
                        </th>
                        <td>
                            <?= esc(config('Email')->SMTPUser) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Destinatarios:
                        </th>
                        <td>
                            <?= esc(setting()->get('App.emails', 'to')) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Destinatarios CC:
                        </th>
                        <td>
                            <?= esc(setting()->get('App.emails', 'cc')) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Destinatarios BCC:
                        </th>
                        <td>
                            <?= esc(setting()->get('App.emails', 'bcc')) ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <!-- Fin de la tabla de configuraciones de emails -->

    <div class="divider"></div>

    <!-- Tabla de configuraciones de aplicaciones -->
    <section>
        <h2 class="text-xl font-bold underline decoration-wavy decoration-secondary underline-offset-4 mb-4">
            Aplicaciones
        </h2>

        <div class="overflow-x-auto">
            <table class="table table-compact table-zebra w-full">
                <thead>
                    <tr>
                        <th>Configuración</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            WhatsApp:
                        </th>
                        <td>
                            <?= esc(setting()->get('App.apps', 'whatsapp')) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Google Tag Manager:
                        </th>
                        <td>
                            <?= esc(setting()->get('App.apps', 'google:tagManager')) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Google Search Console:
                        </th>
                        <td>
                            <?php if (setting()->get('App.apps', 'google:searchConsole')): ?>
                                <a
                                    href="<?= base_url(setting()->get('App.apps', 'google:searchConsole')) ?>"
                                    target="_blank"
                                    class="link link-secondary"
                                >
                                    <?= esc(setting()->get('App.apps', 'google:searchConsole')) ?>
                                </a>
                            <?php endif ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <!-- Fin de la tabla de configuraciones de aplicaciones -->
<?= $this->endSection() ?>
