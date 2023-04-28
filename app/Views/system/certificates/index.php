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

    <!-- Header -->
    <header>
      <?= $this->include('system/components/Header') ?>
    </header>
    <!-- Fin Header -->

    <!-- Content -->
    <main class="py-8 bg-hsm-light-200 min-h-screen w-full">
        <section class="container-w">
            <div class="mb-10">
              <!-- Intro Toolbar -->
              <?= $this->setVar('title','Documentos')->include('system/components/ToolBar') ?>
            </div>

            <!-- Table -->
            <div class="container-w overflow-x-auto">
                <div>
                    <table class="border-spacing-y-2 border-collapse table w-full">
                        <!-- Columns -->
                        <thead class="py-3 table-row-group">
                            <!-- Columns Table -->
                            <?= $this
                            ->setVar('columnsDocuments',$columns)
                            ->include('system/components/ColumnsTable') ?>
                        </thead>

                        <tbody>
                            <!-- Rows information  -->
                            <tr class="shadow-lg [&>td]:p-4 bg-white text-hsm-gray-200">
                              <!-- Rows Table -->
                              <?= $this
                              ->setVar('rowsInformation', $rowsInformation)
                              ->include('system/components/RowsTable') ?>

                                <!-- <td class="py-3 text-hsm-gray-1 pl-5 text-left rounded-tl-xl rounded-bl-xl border-hsm-purple-3 border-r-0 border-[1px] font-bold text-black">
                                  ABC-123
                                </td>
                               -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- Fin Tabla de Documentos -->

        <?= $this->include('system/components/NewDocumentModal') ?>

    </main>
    <!-- Fin modulo de documentos -->

<?= $this->endSection() ?>
