 <!-- ToolBar  -->
 <div class="flex flex-col gap-y-7 sm:flex-row sm:justify-between items-center">
      <h1 class="text-3xl font-bold text-hsm-dark-100">
        <?= esc($title) ?>
      </h1>

      <!-- Render this button  depends of the role -->
      <!-- Create new button -->
      <?= $this
          ->setVar('text', 'Nuevo documento')
          ->setVar('modalName', 'modalNewDocument')
          ->include('system/components/ButtonToggleModal') ?>
</div>
