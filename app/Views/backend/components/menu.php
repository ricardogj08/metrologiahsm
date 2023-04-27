<?php $role = session('user.role')  ?>

<!-- Menú de navegación -->
<ul class="menu p-4 w-64 bg-base-200 text-base-content">
    <li>
        <a
            href="<?= url_to('backend.modules.prospects.index') ?>"
            class="text-xl font-bold"
        >
            <img
                src="<?= base_url(['uploads/settings', setting()->get('App.general', 'favicon')]) ?>"
                alt="Favicon de <?= esc(setting()->get('App.general', 'company')) ?>"
                class="w-6 h-6 object-cover"
            >
            Dashboard
        </a>
    </li>

    <li></li>

    <!-- Enlaces de navegación de los módulos -->
    <li class="menu-title">
        <span>
            Módulos
        </span>
    </li>

    <li>
        <a
            href="<?= url_to('backend.modules.prospects.index') ?>"
            class="<?= url_is_child('backend.modules.prospects.index') ? 'active' : '' ?>"
        >
            <i class="ri-folder-user-fill text-2xl"></i>
            Prospectos
        </a>
    </li>
    <!-- Fin de los enlaces de navegación de los módulos -->

    <!-- Enlaces de navegación generales -->
    <?php if ($role === 'admin'): ?>
        <li class="menu-title">
            <span>
                General
            </span>
        </li>

        <li>
            <a
                href="<?= url_to('backend.settings.index') ?>"
                class="<?= url_is_child('backend.settings.index') ? 'active' : '' ?>"
            >
                <i class="ri-settings-4-fill text-2xl"></i>
                Configuraciones
            </a>
        </li>

        <li>
            <a
                href="<?= url_to('backend.users.index') ?>"
                class="<?= url_is_child('backend.users.index') ? 'active' : '' ?>"
            >
                <i class="ri-shield-user-fill text-2xl"></i>
                Usuarios
            </a>
        </li>
    <?php endif ?>
    <!-- Fin de los enlaces de navegación generales -->

    <li class="grow bg-transparent"></li>

    <li></li>

    <!-- Datos del usuario de sesión -->
    <div class="collapse collapse-arrow text-sm">
        <input type="checkbox" aria-label="Botón que desglosa las opciones de la cuenta del usuario" class="peer">
        <div class="collapse-title font-medium peer-checked:text-primary">
            <?= esc(session('user.name')) ?>
        </div>
        <div class="collapse-content">
            <ul>
                <li>
                    <a
                        href="<?= url_to('backend.account.update') ?>"
                        class="<?= url_is_child('backend.account.update') ? 'active' : '' ?>"
                    >
                        <i class="ri-account-circle-fill text-xl"></i>
                        Mi cuenta
                    </a>
                </li>
                <li>
                    <label for="modal-confirm-logout">
                        <i class="ri-logout-circle-r-line text-xl"></i>
                        Cerrar sesión
                    </label>
                </li>
            </ul>
        </div>
    </div>
    <!-- Fin de los datos del usuario de sesión -->
</ul>
<!-- Fin del menú de navegación -->

<!-- Modal de confirmación de cierre de sesión -->
<?= $this->setData([
    'id'        => 'modal-confirm-logout',
    'routeName' => 'backend.auth.logout',
    'message'   => '¿Deseas cerrar sesión?',
])->include('backend/components/modal-confirm') ?>
<!-- Fin del modal de confirmación de cierre de sesión -->
