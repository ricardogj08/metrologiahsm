<?= $this->extend('landing/templates/page') ?>

<?= $this->section('head') ?>
    <title>
    </title>

    <meta
        name="description"
        content=""
    >
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- Header -->
    <header class="bg-black">
        <section class="px-8 py-4 flex justify-between items-center">
            <div class="lg:flex items-center text-center">
                <span class="inline-block mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                        <path fill="#FFD200" d="M2.8502.2139 2.018.17c-.2628 0-.5257.0877-.7009.263C.9227.7833.2657 1.4404.0904 2.3165-.2162 3.631.2657 5.208 1.4047 6.785c1.139 1.577 3.3293 4.1178 7.1843 5.213 1.2266.3505 2.1904.1314 2.979-.3504a2.5851 2.5851 0 0 0 1.139-1.6647l.1314-.6133c.0438-.1753-.0439-.3943-.2191-.4819L9.8594 7.6173c-.1752-.0877-.3942-.0438-.5256.1314L8.2386 9.1505c-.0877.0877-.219.1314-.3505.0877-.7447-.263-3.2417-1.3143-4.5998-3.9427-.0438-.1314-.0438-.2629.0439-.3504l1.0513-1.1828c.0877-.1314.1314-.3067.0877-.4381L3.2008.4767C3.1568.3453 3.0255.214 2.8502.214Z"></path>
                    </svg>
                </span>
                <a
                    href="tel:+524421959668"
                    class="text-white hover:font-bold transition-all"
                >
                    442 195 9668
                </a>
            </div>
            <a href="#contact" class="px-4 py-2 text-black font-bold bg-hsm-yellow-100 rounded-lg hover:opacity-80 transition-opacity">
                Contáctanos
            </a>
        </section>
    </header>

    <!-- Hero -->
    <main class="relative grid place-content-center min-h-[430px] bg-back-landing bg-cover bg-center">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="container relative text-center">
            <h1 class="font-extrabold text-5xl sm:text-6xl text-white">
                Laboratorio de <strong class="text-hsm-yellow-100">Metrología</strong>
            </h1>
            <h2 class="mt-4 mb-7 text-xl font-semibold text-white">
                Especialistas en Soluciones de Medición
            </h2>
            <a href="#contact" class="px-4 py-3 text-black font-bold bg-hsm-yellow-100 rounded-lg hover:opacity-90 transition-opacity">
                Contáctanos ahora
            </a>
        </div>
    </main>

    <!-- Areas -->
    <section class="py-8">
        <h3 class="w-11/12 mx-auto mb-8 text-4xl text-center text-black font-extrabold">
            Somos expertos en múltiples áreas de medición
        </h3>
        <div class="flex pl-20">
            <p>
                Descubre cómo HSM puede ayudarte en tus necesidades específicas
            </p>
        </div>
    </section>

    <!-- Copy -->
    <section class="py-8 grid place-content-center min-h-[460px] bg-hsm-yellow-100">
        <div class="container flex flex-col lg:flex-row justify-between gap-8">
            <div class="lg:w-2/5 grid grid-cols-3 items-center gap-8">
                <figure class="w-5/6 min-w-[90px]">
                    <img
                        src="<?= base_url('images/landing/pages/iso.webp') ?>"
                        alt="Logo de la ISO"
                        class="w-ful object-cover"
                        >
                </figure>
                <figure class="w-5/6 min-w-[90px]">
                    <img
                        src="<?= base_url('images/landing/pages/ilac.webp') ?>"
                        alt="Logo de la ilac"
                        class="w-ful object-cover"
                        >
                </figure>
                <figure class="w-5/6 min-w-[90px]">
                    <img
                        src="<?= base_url('images/landing/pages/pjla.webp') ?>"
                        alt="Logo de la Pjla"
                        class="w-ful object-cover"
                        >
                </figure>
            </div>
            <div class="lg:w-1/2 xl:w-2/5">
                <hgroup>
                    <h3 class="text-3xl sm:text-4xl text-center sm:text-left font-extrabold text-black">
                        Confiabilidad y excelencia garantizada
                    </h3>
                    <p class="mt-4 text-hsm-gray-100">
                        En HSM, nos tomamos en serio la calidad y precisión de nuestros servicios de metrología, es por ello que contamos con acreditaciones reconocidas internacionalmente que demuestran nuestra capacidad para realizar mediciones precisas y confiables en múltiples áreas de medición.
                    </p>
                </hgroup>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="grid place-content-center py-8 bg-hsm-gray-100 text-white min-h-[980px]">
        <div class="container">
            <hgroup class="mb-14 text-center">
                <h3 class="font-extrabold text-3xl sm:text-4xl">
                    Nuestro compromiso va más allá de la medición
                </h3>
                <p class="mt-4 max-w-4xl mx-auto">
                    En HSM creemos que la calidad está en los detalles es por ello que buscamos ofrecer a nuestros clientes el mejor servicio de metrología posible.
                </p>
            </hgroup>
            <ul class="w-11/12 mx-auto grid md:grid-cols-2 gap-x-8 gap-y-14">
                <li class="flex gap-7">
                    <div>
                        <span>
                            <?= $this->include('landing/components/icons/admin') ?>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-bold text-hsm-yellow-100">
                            Gestión de Instrumentos
                        </h3>
                        <p class="mt-2">
                            No te preocupes por los tiempos de vencimiento, nosotros nos encargamos de que tus equipos sean calibrados en tiempo y forma.
                        </p>
                    </div>
                </li>
                <li class="flex gap-7">
                    <div>
                        <span>
                            <?= $this->include('landing/components/icons/transportation') ?>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-bold text-hsm-yellow-100">
                            Recolección y Entregas Just in Time
                        </h3>
                        <p class="mt-2">
                            Las recolecciones y entregas programadas en tiempos pactados no generan ningún costo para nuestros clientes.
                        </p>
                    </div>
                </li>
                <li class="flex gap-7">
                    <div>
                        <span>
                            <?= $this->include('landing/components/icons/time') ?>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-bold text-hsm-yellow-100">
                            Tiempos de servicio
                        </h3>
                        <p class="mt-2">
                            Brindamos tiempos de entrega reales de acuerdo a tus necesidades.
                        </p>
                    </div>
                </li>
                <li class="flex gap-7">
                    <div>
                        <span>
                            <?= $this->include('landing/components/icons/settings') ?>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-bold text-hsm-yellow-100">
                            Equipos Funcionales
                        </h3>
                        <p class="mt-2">
                            Antes de ingresar al laboratorio, si se detecta una falla o ajuste menor en el equipo son reparados sin costo alguno.
                        </p>
                    </div>
                </li>
                <li class="flex gap-7">
                    <div>
                        <span>
                            <?= $this->include('landing/components/icons/certificate') ?>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-bold text-hsm-yellow-100">
                            Certificados JIT
                        </h3>
                        <p class="mt-2">
                            Te otorgamos informes de calibración antes de la recepción de tu equipo para el análisis de resultados anticipados.
                        </p>
                    </div>
                </li>
                <li class="flex gap-7">
                    <div>
                        <span>
                            <?= $this->include('landing/components/icons/pack') ?>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-bold text-hsm-yellow-100">
                            Empaquetado y Transportación
                        </h3>
                        <p class="mt-2">
                            Tu equipo está en las mejores manos, este será transportado y empaquetado siguiendo procedimientos internos apegados a tus requisitos.
                        </p>
                    </div>
                </li>
                <li class="flex gap-7">
                    <div>
                        <span>
                            <?= $this->include('landing/components/icons/curses') ?>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-bold text-hsm-yellow-100">
                            Cursos/Talleres de Capacitación
                        </h3>
                        <p class="mt-2">
                            Todos nuestros clientes tienen acceso a talleres.
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- Form -->
    <section id="contact" class="py-10 bg-black text-white">
        <div class="container">
            <hgroup class="text-center">
                <h3 class="text-4xl font-extrabold text-center ">
                    ¡Estaremos encantados de ayudarte!
                </h3>
                <p class="mt-3 text-hsm-yellow-100">
                    Contáctanos, uno de nuestros asesores se comunicará a la brevedad.
                </p>
            </hgroup>
            <!-- Form -->
            <form class="max-w-md mx-auto mt-8 flex flex-col gap-6">
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
                        value=""
                        aria-required="true"
                        class="mt-3 px-3 py-2 rounded-md text-hsm-gray-100"
                    >
                </label>

                <!-- Business Name -->
                <label for="business" class="flex flex-col">
                    <span class="font-semibold">
                        Nombre de la empresa: *
                    </span>
                    <input
                        type="text"
                        id="business"
                        name="business"
                        required
                        value=""
                        aria-required="true"
                        class="mt-3 px-3 py-2 rounded-md text-hsm-gray-100"
                    >
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
                        value=""
                        aria-required="true"
                        class="mt-3 px-3 py-2 rounded-md text-hsm-gray-100"
                    >
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
                        value=""
                        aria-required="true"
                        class="mt-3 px-3 py-2 rounded-md text-hsm-gray-100"
                    >
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
                                <?php /*foreach ($states as $state): ?>
                                <option
                                    value="<?= esc($state['id']) ?>"
                                    <?= set_select('state_id', $state['id']) ?>
                                    >
                                    <?= esc($state['name']) ?>
                                </option>
                                <?php endforeach */ ?>
                        </select>
                        <div class="pointer-events-none absolute top-1/2 translate-y-1/2 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-gray-500 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
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
                            value=""
                            class="mt-3 px-3 py-2 rounded-md text-hsm-gray-100"
                        >
                    </label>
                </div>

                <!-- Origin  -->
                <div class="inline-block relative">
                    <label for="origin" class="font-semibold">
                        ¿Cómo supiste de nosotros?: *
                    </label>
                    <select
                        class="mt-3 block appearance-none w-full hover:border-gray-500 px-4 py-2 pr-8 rounded-md shadow leading-tight focus:outline-none focus:shadow-outline text-hsm-gray-100"
                        name="origin"
                        required
                    >
                        <option value="" selected>
                            Selecciona como supiste de nosotros
                        </option>
                    </select>
                    <div class="pointer-events-none absolute top-1/2 translate-y-1/2 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-gray-500 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </div>
                </div>

                <!-- Message -->
                <label for="message" class="flex flex-col">
                    <span class="font-semibold">
                        ¿En qué podemos ayudarte? *
                    </span>
                    <textarea
                        name="message"
                        id="message"
                        rows="10"
                        class="mt-3 px-3 py-2 rounded-md text-hsm-gray-100"
                        placeholder="Mensaje"></textarea>
                </label>

                <button type="submit"  class="p-3 rounded-md text-hsm-gray-100 font-bold bg-hsm-yellow-100">
                    Enviar
                </button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 bg-hsm-yellow-100">
        <section class="w-11/12 mx-auto bg-white text-black rounded-md sm:rounded-full">
            <ul class="px-6 py-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <li>
                    <div class="lg:flex items-center text-center">
                        <span class="inline-block mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                <path fill="#FFD200" d="M2.8502.2139 2.018.17c-.2628 0-.5257.0877-.7009.263C.9227.7833.2657 1.4404.0904 2.3165-.2162 3.631.2657 5.208 1.4047 6.785c1.139 1.577 3.3293 4.1178 7.1843 5.213 1.2266.3505 2.1904.1314 2.979-.3504a2.5851 2.5851 0 0 0 1.139-1.6647l.1314-.6133c.0438-.1753-.0439-.3943-.2191-.4819L9.8594 7.6173c-.1752-.0877-.3942-.0438-.5256.1314L8.2386 9.1505c-.0877.0877-.219.1314-.3505.0877-.7447-.263-3.2417-1.3143-4.5998-3.9427-.0438-.1314-.0438-.2629.0439-.3504l1.0513-1.1828c.0877-.1314.1314-.3067.0877-.4381L3.2008.4767C3.1568.3453 3.0255.214 2.8502.214Z"></path>
                            </svg>
                        </span>
                        <a
                            href="tel:+524421959668"
                            class="font-semibold hover:opacity-80 transition-all"
                        >
                            (442) 195 9668
                        </a>
                    </div>
                </li>
                <li>
                    <div class="lg:flex items-center text-center">
                        <span class="inline-block mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                <path fill="#FFD200" d="M2.8502.2139 2.018.17c-.2628 0-.5257.0877-.7009.263C.9227.7833.2657 1.4404.0904 2.3165-.2162 3.631.2657 5.208 1.4047 6.785c1.139 1.577 3.3293 4.1178 7.1843 5.213 1.2266.3505 2.1904.1314 2.979-.3504a2.5851 2.5851 0 0 0 1.139-1.6647l.1314-.6133c.0438-.1753-.0439-.3943-.2191-.4819L9.8594 7.6173c-.1752-.0877-.3942-.0438-.5256.1314L8.2386 9.1505c-.0877.0877-.219.1314-.3505.0877-.7447-.263-3.2417-1.3143-4.5998-3.9427-.0438-.1314-.0438-.2629.0439-.3504l1.0513-1.1828c.0877-.1314.1314-.3067.0877-.4381L3.2008.4767C3.1568.3453 3.0255.214 2.8502.214Z"></path>
                            </svg>
                        </span>
                        <a
                            href="tel:+524461135540"
                            class="font-semibold hover:opacity-80 transition-all"
                        >
                            (446) 113 5540
                        </a>
                    </div>
                </li>
                <li>
                    <div class="lg:flex items-center text-center">
                        <span class="inline-block mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                <path fill="#FFD200" d="M2.8502.2139 2.018.17c-.2628 0-.5257.0877-.7009.263C.9227.7833.2657 1.4404.0904 2.3165-.2162 3.631.2657 5.208 1.4047 6.785c1.139 1.577 3.3293 4.1178 7.1843 5.213 1.2266.3505 2.1904.1314 2.979-.3504a2.5851 2.5851 0 0 0 1.139-1.6647l.1314-.6133c.0438-.1753-.0439-.3943-.2191-.4819L9.8594 7.6173c-.1752-.0877-.3942-.0438-.5256.1314L8.2386 9.1505c-.0877.0877-.219.1314-.3505.0877-.7447-.263-3.2417-1.3143-4.5998-3.9427-.0438-.1314-.0438-.2629.0439-.3504l1.0513-1.1828c.0877-.1314.1314-.3067.0877-.4381L3.2008.4767C3.1568.3453 3.0255.214 2.8502.214Z"></path>
                            </svg>
                        </span>
                        <a
                            href="tel:+524428078434"
                            class="font-semibold hover:opacity-80 transition-all"
                        >
                            (442) 807 8434
                        </a>
                    </div>
                </li>
                <li>
                    <div class="lg:flex items-center text-center">
                        <span class="inline-block mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                <path fill="#FFD200" d="M2.8502.2139 2.018.17c-.2628 0-.5257.0877-.7009.263C.9227.7833.2657 1.4404.0904 2.3165-.2162 3.631.2657 5.208 1.4047 6.785c1.139 1.577 3.3293 4.1178 7.1843 5.213 1.2266.3505 2.1904.1314 2.979-.3504a2.5851 2.5851 0 0 0 1.139-1.6647l.1314-.6133c.0438-.1753-.0439-.3943-.2191-.4819L9.8594 7.6173c-.1752-.0877-.3942-.0438-.5256.1314L8.2386 9.1505c-.0877.0877-.219.1314-.3505.0877-.7447-.263-3.2417-1.3143-4.5998-3.9427-.0438-.1314-.0438-.2629.0439-.3504l1.0513-1.1828c.0877-.1314.1314-.3067.0877-.4381L3.2008.4767C3.1568.3453 3.0255.214 2.8502.214Z"></path>
                            </svg>
                        </span>
                        <a
                            href="tel:+524424739567"
                            class="font-semibold hover:opacity-80 transition-all"
                        >
                            (442) 473 9567
                        </a>
                    </div>
                </li>
            </ul>
        </section>
        <section class="mt-10 flex flex-col justify-center sm:flex-row sm:justify-between items-center w-11/12 mx-auto gap-y-5 gap-x-3">
            <div class="font-bold text-black text-center sm:text-left">
                <p>
                    Blvd. Bernardo Quintana No. 630 Int.21
                </p>
                <p>
                    Col. Desarrollo San Pablo, Querétaro, Qro.
                </p>
            </div>
            <div class="text-sm text-black text-center sm:text-left">
                <p>
                    Metrología HSM. Todos los derechos Reservados 2023. <strong class="font-semibold">Aviso de privacidad.</strong>
                </p>
                <p>
                    Diseño y desarrollo web por: Genotipo®
                </p>
            </div>
        </section>
    </footer>
<?= $this->endSection() ?>
