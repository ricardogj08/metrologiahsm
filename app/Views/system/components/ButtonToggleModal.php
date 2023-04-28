<button data-modal-target="<?= esc($modalName) ?>" data-modal-toggle="<?= esc($modalName) ?>" type="button" class="relative inline-block pl-4 pr-8 py-3 transition hover:brightness-90 bg-hsm-blue-100 rounded-lg ">
    <span class="inline-block cursor-pointer mr-3 text-white font-semibold" >
        <?= esc($text) ?>
    </span>

    <div class="h-full aspect-[1/1] absolute top-1/2 -translate-y-1/2 -right-5 rounded-full bg-white shadow-md flex justify-center items-center">
        <span>
            <svg class="w-6 fill-hsm-green-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
            </svg>
        </span>
    </div>
</button>
