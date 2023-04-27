<?= $this->extend('system/templates/auth') ?>

<?= $this->section('head') ?>
    <title>
        Privacidad y seguridad
    </title>

    <meta
        name="description"
        content="Cambia tu contraseña."
    >
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <figure class="absolute -top-14 left-0 w-full">
        <img
            src="<?= base_url('images/system/auth/newPassword.webp') ?>"
            alt="Privacidad y seguridad"
            class="w-auto h-24 lg:h-32 m-auto"
        >
    </figure>

    <hgroup class="pb-4 lg:pb-8 text-center">
        <h1 class="text-22 font-bold">
            Privacidad y seguridad
        </h1>
        <p class="text-sm text-hsm-gray-100">
            Cambia tu contraseña
        </p>
    </hgroup>

    <?= form_open('', ['class' => 'flex flex-col gap-y-5']) ?>
        <!-- Campo de la contraseña -->
        <div>
            <label for="password" class="text-hsm-gray-100 text-15 mb-2 block">
                Ingresa tu nueva contraseña
            </label>
            <div>
                <input
                    type="password"
                    name="password"
                    id="password"
                    value=""
                    placeholder="*****"
                    class="border border-hsm-purple-100 rounded-xl w-full p-2 outline-none text-hsm-gray-200 text-13"
                >
            </div>
        </div>
        <!-- Fin del campo de la contraseña -->

        <!-- Campo de repetir contraseña -->
        <div>
            <label for="pass_confirm" class="text-hsm-gray-100 text-15 mb-2 block">
                Repite la contraseña
            </label>
            <div>
                <input
                    type="password"
                    name="pass_confirm"
                    id="pass_confirm"
                    value=""
                    placeholder="*****"
                    class="border border-hsm-purple-100 rounded-xl w-full p-2 outline-none text-hsm-gray-200 text-13"
                >
            </div>
        </div>
        <!-- Fin del campo de repetir contraseña -->

        <input
            type="submit"
            value="Continuar"
            class="mt-1.5 bg-hsm-green-100 text-white font-bold py-3 rounded-xl cursor-pointer hover:opacity-90 transition w-full"
        >
    <?= form_close() ?>
<?= $this->endSection() ?>
