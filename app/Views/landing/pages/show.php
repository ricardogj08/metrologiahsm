<?= $this->extend('landing/templates/page') ?>

<?= $this->section('head') ?>
    <title>
    </title>

    <meta
        name="description"
        content=""
    >
    <link rel="stylesheet" href="<?= base_url('css/modules/glide.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <script src="<?= base_url('js/modules/glide.min.js') ?>"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="relative wrapper-web">
        <!-- Whatsapp component -->
        <div class="fixed right-8 top-20 z-10">
            <?= $this->include('landing/components/WhatsApp') ?>
        </div>

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
                <figure class="absolute top-6 left-1/2 -translate-x-1/2 max-w-[100px] z-20">
                    <img src="<?= base_url('images/landing/pages/logo.webp') ?>" alt="Logo HSM" class="w-full object-cover">
                </figure>
                <a href="#contact" class="px-4 py-2 text-black font-bold bg-hsm-yellow-100 rounded-lg hover:opacity-80 transition-opacity">
                    Contáctanos
                </a>
            </section>
        </header>

        <!-- Hero -->
        <main class="relative grid place-content-center min-h-[430px] bg-back-landing bg-cover bg-center">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="container-w relative text-center">
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
            <div class="w-11/12 mx-auto xl:w-full flex flex-col xl:flex-row xl:pl-20 gap-8">
                <p class="text-center xl:text-left">
                    Descubre cómo HSM puede ayudarte en tus necesidades específicas
                </p>
                <div class="xl:w-3/4">
                    <?= $this->include('landing/components/AreasCarousel') ?>
                </div>
            </div>
        </section>

        <!-- Copy -->
        <section class="py-8 grid place-content-center min-h-[460px] bg-hsm-yellow-100">
            <div class="container-w flex flex-col lg:flex-row justify-between gap-8">
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
                            En HSM, nos tomamos en serio la calidad de nuestros servicios de metrología, es por ello que contamos con acreditaciones reconocidas internacionalmente que demuestran nuestra capacidad para realizar mediciones confiables en múltiples áreas de medición.
                        </p>
                    </hgroup>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section class="grid place-content-center py-12 bg-hsm-gray-100 text-white min-h-[980px]">
            <div class="container">
                <hgroup class="mb-14 text-center">
                    <h3 class="font-extrabold text-3xl sm:text-4xl">
                        Nuestro compromiso va más allá de la medición
                    </h3>
                    <p class="mt-4 max-w-4xl mx-auto">
                        En HSM creemos que la calidad está en los detalles es por ello que buscamos ofrecer a nuestros clientes el mejor servicio de metrología posible.
                    </p>
                </hgroup>
                <?= $this->include('landing/components/FeaturesList') ?>
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
                <?= $this->include('landing/components/ContactForm') ?>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-8 bg-hsm-yellow-100">
            <!-- Números telefónico -->
            <section class="w-11/12 mx-auto bg-white text-black rounded-md sm:rounded-full">
                <ul class="px-6 py-4 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php foreach (explode(', ', $phones) as $phone): ?>
                        <li>
                            <div class="lg:flex items-center text-center">
                                <span class="inline-block mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                        <path fill="#FFD200" d="M2.8502.2139 2.018.17c-.2628 0-.5257.0877-.7009.263C.9227.7833.2657 1.4404.0904 2.3165-.2162 3.631.2657 5.208 1.4047 6.785c1.139 1.577 3.3293 4.1178 7.1843 5.213 1.2266.3505 2.1904.1314 2.979-.3504a2.5851 2.5851 0 0 0 1.139-1.6647l.1314-.6133c.0438-.1753-.0439-.3943-.2191-.4819L9.8594 7.6173c-.1752-.0877-.3942-.0438-.5256.1314L8.2386 9.1505c-.0877.0877-.219.1314-.3505.0877-.7447-.263-3.2417-1.3143-4.5998-3.9427-.0438-.1314-.0438-.2629.0439-.3504l1.0513-1.1828c.0877-.1314.1314-.3067.0877-.4381L3.2008.4767C3.1568.3453 3.0255.214 2.8502.214Z"></path>
                                    </svg>
                                </span>
                                <a
                                    href="tel:<?= esc(stripAllSpaces($phone), 'url') ?>"
                                    class="font-semibold hover:opacity-80 transition-all"
                                >
                                    <?= esc($phone) ?>
                                </a>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </section>
            <!-- Fin de los número telefónicos -->
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
                        Diseño y desarrollo web por:
                        <a href="https://www.genotipo.com/" target="_blank" rel="noreferrer noopener nofollow" class="hover:font-bold transition">
                            Genotipo®
                        </a>
                    </p>
                </div>
            </section>
        </footer>
    </div>
<?= $this->endSection() ?>
