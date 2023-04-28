<?= $this->extend('system/templates/dashboard') ?>

<?= $this->section('head') ?>
    <title>
        Sistema | Documentos
    </title>

    <meta
        name="description"
        content="Crea y consulta documentos."
    >
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <script src="<?= base_url('js/system/components/file.js') ?>"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="relative overflow-x-hidden">
        <!-- Header -->
          <?= $this->include('system/components/Header') ?>
        <!-- Fin Header -->

        <!-- Content -->
        <main class="py-8 bg-hsm-light-200 min-h-screen w-full">
            <section class="container-w">
                <div class="mb-10">
                  <!-- Intro Toolbar -->
                  <?= $this->setVar('title','Documentos')->include('system/components/ToolBar') ?>
                </div>

                <!-- Render the user table or the admin table -->
                <?= $this->include('system/components/SingleTable') ?>

                </div>
            </section>
            <!-- Fin Tabla de Documentos -->

            <?= $this->include('system/components/NewDocumentModal') ?>

        </main>
        <!-- Fin modulo de documentos -->
    </div>

<?= $this->endSection() ?>
