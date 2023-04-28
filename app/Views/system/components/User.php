<div class="flex items-center gap-2">
    <!-- Name  -->
    <span class="text-sm sm:text-base font-semibold">
        <?= esc($user) ?>
    </span>
    <!-- Avatar -->
    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full flex justify-center items-center bg-hsm-yellow-100">
          <span class="font-bold text-lg sm:text-xl">
            <?= esc($user[0]) ?>
          </span>
    </div>
</div>
