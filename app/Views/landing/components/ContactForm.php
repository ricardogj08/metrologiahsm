<!-- Form -->
<?= form_open(url_to('landing.prospects.create'), ['class' => 'max-w-md mx-auto mt-8 flex flex-col gap-6']) ?>
    <p class="text-red-400">
        <small>
            <?= esc(session()->getFlashData('error')) ?>
        </small>
    </p>

    <!-- Name -->
    <label for="name" class="flex flex-col">
        <span class="font-semibold">
            Nombre Completo: *
        </span>
        <input
            type="text"
            id="name"
            name="name"
            required
            maxlength="128"
            value="<?= set_value('name') ?>"
            aria-required="true"
            class="mt-3 px-3 py-2 rounded-md text-hsm-gray-100"
        >
        <small class="text-red-400">
            <?= validation_show_error('name') ?>
        </small>
    </label>

    <!-- Company Name -->
    <label for="company" class="flex flex-col">
        <span class="font-semibold">
            Nombre de la empresa: *
        </span>
        <input
            type="text"
            id="company"
            name="company"
            required
            maxlength="128"
            value="<?= set_value('company') ?>"
            aria-required="true"
            class="mt-3 px-3 py-2 rounded-md text-hsm-gray-100"
        >
        <small class="text-red-400">
            <?= validation_show_error('company') ?>
        </small>
    </label>

    <!-- Phone -->
    <label for="phone" class="flex flex-col">
        <span class="font-semibold">
            Teléfono: *
        </span>
        <input
            type="tel"
            id="phone"
            name="phone"
            required
            maxlength="15"
            pattern="[0-9]{1,15}"
            value="<?= set_value('phone') ?>"
            aria-required="true"
            class="mt-3 px-3 py-2 rounded-md text-hsm-gray-100"
        >
        <small class="text-red-400">
            <?= validation_show_error('phone') ?>
        </small>
    </label>

    <!-- Email -->
    <label for="email" class="flex flex-col">
        <span class="font-semibold">
            Correo electrónico: *
        </span>
        <input
            type="email"
            id="email"
            name="email"
            required
            maxlength="256"
            value="<?= set_value('email') ?>"
            aria-required="true"
            class="mt-3 px-3 py-2 rounded-md text-hsm-gray-100"
        >
        <small class="text-red-400">
            <?= validation_show_error('email') ?>
        </small>
    </label>

    <div class="flex flex-col sm:flex-row gap-x-4">
        <!-- State -->
        <div class="inline-block relative w-full">
            <label for="state_id" class="font-semibold">
                Estado: *
            </label>
            <select
                class="mt-3 block appearance-none w-full hover:border-gray-500 px-4 py-2 pr-8 rounded-md shadow leading-tight focus:outline-none focus:shadow-outline text-hsm-gray-100"
                name="state_id"
                required
            >
                <option value="" selected>
                    Selecciona tu estado
                </option>
                <?php foreach ($states as $state): ?>
                    <option
                        value="<?= esc($state['id']) ?>"
                        <?= set_select('state_id', $state['id']) ?>
                        >
                        <?= esc($state['name']) ?>
                    </option>
                <?php endforeach ?>
            </select>
            <div class="pointer-events-none absolute top-1/2 translate-y-1/2 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-gray-500 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                </svg>
            </div>
            <small class="text-red-400">
                <?= validation_show_error('state_id') ?>
            </small>
        </div>

        <!-- City -->
        <label for="city" class="w-full flex flex-col">
            <span class="font-semibold">
                Ciudad: *
            </span>
            <input
                type="text"
                id="city"
                name="city"
                required
                maxlength="128"
                value="<?= set_value('city') ?>"
                class="mt-3 px-3 py-2 rounded-md text-hsm-gray-100"
            >
            <small class="text-red-400">
                <?= validation_show_error('city') ?>
            </small>
        </label>
    </div>

    <!-- Origin  -->
    <div class="inline-block relative">
        <label for="origin_id" class="font-semibold">
            ¿Cómo supiste de nosotros?: *
        </label>
        <select
            class="mt-3 block appearance-none w-full hover:border-gray-500 px-4 py-2 pr-8 rounded-md shadow leading-tight focus:outline-none focus:shadow-outline text-hsm-gray-100"
            name="origin_id"
            required
        >
            <option value="" selected>
                Selecciona como supiste de nosotros
            </option>
            <?php foreach ($origins as $origin): ?>
                <option
                    value="<?= esc($origin['id']) ?>"
                    <?= set_select('origin_id', $origin['id']) ?>
                    >
                    <?= esc($origin['name']) ?>
                </option>
            <?php endforeach ?>
        </select>
        <div class="pointer-events-none absolute top-1/2 translate-y-1/2 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-gray-500 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
            </svg>
        </div>
        <small class="text-red-400">
            <?= validation_show_error('origin_id') ?>
        </small>
    </div>

    <!-- Message -->
    <label for="message" class="flex flex-col">
        <span class="font-semibold">
            ¿En qué podemos ayudarte? *
        </span>
        <textarea
            name="message"
            id="message"
            required
            maxlength="4096"
            rows="10"
            class="mt-3 px-3 py-2 rounded-md text-hsm-gray-100"
            placeholder="Mensaje"><?= set_value('message') ?></textarea>
        <small class="text-red-400">
            <?= validation_show_error('message') ?>
        </small>
    </label>

    <button type="submit"  class="p-3 rounded-md text-hsm-gray-100 font-bold bg-hsm-yellow-100">
        Enviar
    </button>
<?= form_open() ?>
