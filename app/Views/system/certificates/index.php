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
      <?= $this->include('system/components/navbar') ?>
    </header>
    <!-- Fin Header -->

    <!-- Contenido de modulo documentos -->
    <main class="py-8 bg-hsm-light-200 min-h-screen w-full">
        <!-- Tabla de Documentos -->
        <section class="">
            <div class="container mb-10">
                <div class="flex flex-col gap-y-7 sm:flex-row sm:justify-between items-center">
                    <h1 class="text-3xl font-bold text-hsm-dark-100">Documentos</h1>
                    <!-- Create new -->
                    <button data-modal-target="formModal" data-modal-toggle="formModal" type="button" class="relative inline-block pl-4 pr-8   py-3 transition hover:brightness-90 bg-hsm-blue-100 rounded-lg ">
                        <span class="inline-block cursor-pointer mr-3 text-white font-semibold" >
                            Nuevo documento
                        </span>

                        <div class="h-full aspect-[1/1] absolute top-1/2 -translate-y-1/2 -right-5 rounded-full bg-white shadow-md flex justify-center items-center">
                            <span>
                                <svg class="w-6 fill-hsm-green-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                  <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
                                </svg>
                            </span>
                        </div>

                    </button>
                </div>
            </div>

            <div class="container-w overflow-x-auto">
                <div>
                    <table class="border-spacing-y-2 border-collapse table w-full">
                        <!-- Columns -->
                        <thead class="py-3 table-row-group">
                            <tr class="text-left [&>th]:p-4">
                            <!-- [&>th]:hidden lg:[&>th]:table-cell -->
                                <th class="text-sm">
                                  ID Instrumento
                                </th>
                                <th class="text-sm">
                                  Descripición
                                </th>
                                <th class="text-sm">
                                  Certificado
                                </th>
                                <th class="text-sm">
                                  Fecha de Recepción
                                </th>
                                <th class="text-sm">
                                  Fecha de Calibración
                                </th>
                                <th class="text-sm">
                                  Fecha de Entrega
                                </th>
                                <th class="text-sm">
                                  Observaciones
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Rows information  -->
                            <tr class="shadow-lg [&>td]:p-4 bg-white text-hsm-gray-200">
                            <!-- [&>td]:block lg:[&>td]:table-cell -->
                                <td class="py-3 text-hsm-gray-1 pl-5 text-left rounded-tl-xl rounded-bl-xl border-hsm-purple-3 border-r-0 border-[1px] font-bold text-black">
                                  ABC-123
                                </td>
                                <td class="py-3 text-hsm-gray-1 px-2 border-hsm-purple-3 border-x-0 border-[1px]">
                                  Medidor de espesores
                                </td>
                                <td class="py-3 text-hsm-gray-1 px-2 border-hsm-purple-3 border-x-0 border-[1px]">
                                  HSM-23-DI-A008
                                </td>
                                <td class="py-3 text-hsm-gray-1 px-2 border-hsm-purple-3 border-x-0 border-[1px]">
                                  15 - 01 - 2023
                                </td>
                                <td class="py-3 text-hsm-gray-1 px-2 border-hsm-purple-3 border-x-0 border-[1px]">
                                  15 - 01 - 2023
                                </td>
                                <td class="py-3 text-hsm-gray-1 px-2 border-hsm-purple-3 border-x-0 border-[1px]">
                                  15 - 01 - 2023
                                </td>
                                <td class="py-3 px-2 border-hsm-purple-3 border-x-0 border-[1px] font-semibold text-black">
                                  Equipo en…
                                </td>
                                <td class="bg-transparent pl-4">
                                    <div>
                                        <label id="dropdownDefaultButton" data-dropdown-toggle="dropdownBottom" data-dropdown-placement="bottom" type="button" class="cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-7 h-7 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                                        </label>
                                        <div id="dropdownBottom" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-28">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                                <li>
                                                    <a></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- Fin Tabla de Documentos -->

        <?= $this->include('system/components/modal') ?>

    </main>
    <!-- Fin modulo de documentos -->

<?= $this->endSection() ?>
