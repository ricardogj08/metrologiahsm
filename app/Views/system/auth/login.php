<?= $this->extend('system/templates/auth') ?>

<?= $this->section('head') ?>
    <title>
        Bienvenido
    </title>

    <meta
        name="description"
        content="Inicia sesión."
    >
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <figure class="absolute -top-14 left-0 w-full">
        <img
            src="<?= base_url('images/system/auth/login.webp') ?>"
            alt="Bienvenido"
            class="w-auto h-24 lg:h-32 m-auto"
        >
    </figure>

    <hgroup class="pb-4 lg:pb-8 text-center">
        <h1 class="text-22 font-bold">
            Bienvenido
        </h1>
        <p class="text-sm text-hsm-gray-100">
            Inicia sesión
        </p>
    </hgroup>

    <?= form_open('', ['class' => 'flex flex-col gap-y-5']) ?>
        <!-- Campo del usuario -->
        <div>
            <label for="email" class="text-hsm-gray-100 text-15 mb-2 block">
                Usuario
            </label>
            <div class="border border-hsm-purple-100 rounded-xl flex items-center gap-x-1 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4 fill-hsm-purple-200">
                    <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                </svg>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value=""
                    placeholder="Correo electrónico"
                    class="text-hsm-gray-200 text-13 w-full outline-none"
                >
            </div>
        </div>
        <!-- Fin del campo del usuario -->

        <!-- Campo de la contraseña -->
        <div>
            <label for="password" class="text-hsm-gray-100 text-15 mb-2 block">
                Contraseña
            </label>
            <div class="border border-hsm-purple-100 rounded-xl flex items-center gap-x-1 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4 fill-hsm-purple-200">
                    <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/>
                </svg>
                <input
                    type="password"
                    name="password"
                    id="password"
                    value=""
                    placeholder="*****"
                    class="text-hsm-gray-200 text-13 w-full outline-none"
                >
            </div>
        </div>
        <!-- Fin del campo de la contraseña -->

        <input
            type="submit"
            value="Iniciar sesión"
            class="mt-1.5 bg-hsm-blue-100 text-white font-bold py-3 rounded-xl cursor-pointer hover:opacity-90 transition w-full"
        >
    <?= form_close() ?>
<?= $this->endSection() ?>
