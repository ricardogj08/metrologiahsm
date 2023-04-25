<?= $this->extend('backend/templates/emails') ?>

<?= $this->section('head') ?>
    <title>
        <?= esc($prospect['name']) ?>
    </title>

    <meta
        name="description"
        content="Registro del prospecto."
    >
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1 class="text-2xl font-bold underline decoration-wavy decoration-accent underline-offset-4 mb-4">
        <?= esc($title ?? 'Prospecto') ?>
    </h1>

    <!-- Tabla de datos del prospecto -->
    <div class="flex flex-col pb-4">
        <div class="flex flex-col lg:flex-row gap-x-4 odd:bg-base-100 even:bg-base-200 p-2">
            <h2 class="font-bold lg:w-1/3">
                Nombre completo:
            </h2>
            <p class="flex-1">
                <?= esc($prospect['name']) ?>
            </p>
        </div>

        <div class="flex flex-col lg:flex-row gap-x-4 odd:bg-base-100 even:bg-base-200 p-2">
            <h2 class="font-bold lg:w-1/3">
                Teléfono:
            </h2>
            <p class="flex-1">
                <?= esc($prospect['phone']) ?>
            </p>
        </div>

        <div class="flex flex-col lg:flex-row gap-x-4 odd:bg-base-100 even:bg-base-200 p-2">
            <h2 class="font-bold lg:w-1/3">
                Email:
            </h2>
            <p class="flex-1">
                <?= esc($prospect['email']) ?>
            </p>
        </div>

        <div class="flex flex-col lg:flex-row gap-x-4 odd:bg-base-100 even:bg-base-200 p-2">
            <h2 class="font-bold lg:w-1/3">
                Empresa:
            </h2>
            <p class="flex-1">
                <?= esc($prospect['company']) ?>
            </p>
        </div>

        <div class="flex flex-col lg:flex-row gap-x-4 odd:bg-base-100 even:bg-base-200 p-2">
            <h2 class="font-bold lg:w-1/3">
                Estado:
            </h2>
            <p class="flex-1">
                <?= esc($prospect['state']) ?>
            </p>
        </div>

        <div class="flex flex-col lg:flex-row gap-x-4 odd:bg-base-100 even:bg-base-200 p-2">
            <h2 class="font-bold lg:w-1/3">
                ¿Cómo supiste de nosotros?:
            </h2>
            <p class="flex-1">
                <?= esc($prospect['origin']) ?>
            </p>
        </div>

        <div class="flex flex-col lg:flex-row gap-x-4 odd:bg-base-100 even:bg-base-200 p-2">
            <h2 class="font-bold lg:w-1/3">
                Mensaje:
            </h2>
            <p class="flex-1">
                <?= esc($prospect['message']) ?>
            </p>
        </div>

        <div class="flex flex-col lg:flex-row gap-x-4 odd:bg-base-100 even:bg-base-200 p-2">
            <h2 class="font-bold lg:w-1/3">
                Fecha:
            </h2>
            <p class="flex-1">
                <?= esc(format_date_humanize($prospect['created_at'])) ?>
            </p>
        </div>
    </div>
    <!-- Fin de la tabla de datos del prospecto -->

    <p class="text-center">
        <?= mailto($prospect['email'], 'Responder solicitud', 'class="btn btn-primary btn-wide"') ?>
    </p>
<?= $this->endSection() ?>
