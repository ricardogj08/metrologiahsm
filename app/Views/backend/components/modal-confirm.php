<!-- Modal de confirmación de acciones -->
<input type="checkbox" id="<?= esc($id) ?>" class="modal-toggle">

<label for="<?= esc($id) ?>" class="modal cursor-pointer modal-bottom lg:modal-middle">
    <label class="modal-box relative">
        <!-- Botón que cierra el modal -->
        <label for="<?= esc($id) ?>" class="btn btn-sm btn-circle absolute right-2 top-2">
            x
        </label>

        <h3 class="font-bold text-lg">
            ¡Confirma tu acción!
        </h3>

        <p class="py-4">
            <?= esc($message) ?>
        </p>

        <!-- Botones de acción -->
        <div class="modal-action">
            <a href="<?= url_to($routeName) ?>" class="btn btn-primary">
                Confirmar
            </a>

            <label for="<?= esc($id) ?>" class="btn btn-secondary">
                Cancelar
            </label>
        </div>
        <!-- Fin de los botones de acción -->
    </label>
</label>
<!-- Fin del modal de confirmación de acciones -->
