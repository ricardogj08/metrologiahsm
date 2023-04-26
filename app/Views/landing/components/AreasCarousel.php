<div class="glide ">
    <div class="glide__track py-8 bg-hsm-light-100" data-glide-el="track">
        <ul class="glide__slides text-black">
            <li class="glide__slide grid place-items-center text-center px-3">
                <span class="inline-block  h-10">
                      <?= $this->include('landing/components/icons/areas/hammer') ?>
                </span>
                <span class="font-bold mt-6">Dureza</span>
            </li>
            <li class="glide__slide grid place-items-center text-center px-3">
                <span class="inline-block  h-10">
                      <?= $this->include('landing/components/icons/areas/box') ?>
                </span>
                <span class="font-bold mt-6">Dimensional</span>
            </li>
            <li class="glide__slide grid place-items-center text-center px-3">
                <span class="inline-block  h-10">
                      <?= $this->include('landing/components/icons/areas/pression') ?>
                </span>
                <span class="font-bold mt-6">Presión</span>
            </li>
            <li class="glide__slide grid place-items-center text-center px-3">
                <span class="inline-block  h-10">
                      <?= $this->include('landing/components/icons/areas/strong') ?>
                </span>
                <span class="font-bold mt-6">Fuerza</span>
            </li>
            <li class="glide__slide grid place-items-center text-center px-3">
                <span class="inline-block  h-10">
                      <?= $this->include('landing/components/icons/areas/eye') ?>
                </span>
                <span class="font-bold mt-6">Óptica</span>
            </li>
            <li class="glide__slide grid place-items-center text-center px-3">
                <span class="inline-block  h-10">
                      <?= $this->include('landing/components/icons/areas/weight') ?>
                </span>
                <span class="font-bold mt-6">Masa</span>
            </li>
            <li class="glide__slide grid place-items-center text-center px-3">
                <span class="inline-block  h-10">
                      <?= $this->include('landing/components/icons/areas/life-ring') ?>
                </span>
                <span class="font-bold mt-6">Par torsional</span>
            </li>
            <li class="glide__slide grid place-items-center text-center px-3">
                <span class="inline-block  h-10">
                      <?= $this->include('landing/components/icons/areas/chemistry') ?>
                </span>
                <span class="font-bold mt-6">Química</span>
            </li>
            <li class="glide__slide grid place-items-center text-center px-3">
                <span class="inline-block  h-10">
                      <?= $this->include('landing/components/icons/areas/thermometer') ?>
                </span>
                <span class="font-bold mt-6">Temperatura</span>
            </li>
            <li class="glide__slide grid place-items-center text-center px-3">
                <span class="inline-block  h-10">
                      <?= $this->include('landing/components/icons/areas/bolt') ?>
                </span>
                <span class="font-bold mt-6">Eléctrica</span>
            </li>
            <li class="glide__slide grid place-items-center text-center px-3">
                <span class="inline-block  h-10">
                      <?= $this->include('landing/components/icons/areas/hammer') ?>
                </span>
                <span class="font-bold mt-6">Humedad</span>
            </li>
            <li class="glide__slide flex flex-col items-center justify-center text-center px-3">
                <span class="inline-block  h-10">
                      <?= $this->include('landing/components/icons/areas/clock') ?>
                </span>
                <span class="font-bold mt-6">Tiempo y Frecuencia</span>
            </li>
        </ul>
    </div>
    <div class="glide__arrows mt-2" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left bg-hsm-yellow-100 px-3 rounded-md" data-glide-dir="<">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <polyline points="15 6 9 12 15 18" />
            </svg>
        </button>
        <button class="glide__arrow glide__arrow--right bg-hsm-yellow-100 px-3 rounded-md" data-glide-dir=">">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <polyline points="9 6 15 12 9 18" />
            </svg>
        </button>
    </div>
</div>

<script type="module">
        const config = {
            type: 'carousel',
            startAt: 0,
            perView: 7,
            breakpoints: {
                1200: {
                    perView: 7
                },
                900: {
                    perView: 6
                },
                600: {
                    perView: 4
                },
                500: {
                    perView: 2
                }
            }
        }
        new Glide('.glide', config).mount()
</script>
