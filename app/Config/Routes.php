<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Website\Pages::construction', ['as' => 'website.pages.home']);

/**
 * Definición de rutas de la landing.
 */
$routes->group('landing', static function ($routes) {
    $routes->post('gracias', 'Landing\Prospects::create', ['as' => 'landing.prospects.create']);

    // Rutas de las páginas de la landing.
    $routes->get('(:segment)', 'Landing\Pages::show/$1', ['as' => 'landing.pages.show']);
});

/**
 * Definición de rutas del sistema.
 */
$routes->group('sistema', static function ($routes) {
    // Definición de rutas de autenticación.
    $routes->group('login', static function ($routes) {
        $routes->get('', 'System\Auth::login', ['as' => 'system.auth.login', 'filter' => ['systemAuthRedirect', 'systemAuthNewPassword']]);
        $routes->post('', 'System\Auth::login', ['as' => 'system.auth.login', 'filter' => ['formsrates', 'systemAuthRedirect', 'systemAuthNewPassword']]);
        $routes->match(['get', 'post'], 'nueva-contrasena', 'System\Auth::newPassword', ['as' => 'system.auth.newPassword', 'filter' => ['systemAuth', 'systemAuthRedirect']]);
    });

    $routes->group('', ['filter' => ['systemAuth', 'systemAuthNewPassword']], static function ($routes) {
        // Ruta de cierre de sesión
        $routes->get('logout', 'System\Auth::logout', ['as' => 'system.auth.logout']);

        // Certificates
        $routes->group('certificados', static function ($routes) {
            $routes->get('', 'System\Certificates::index', ['as' => 'system.certificates.index']);
            $routes->post('nuevo', 'System\Certificates::create', ['as' => 'system.certificates.create']);
            $routes->get('descargar/(:segment)', 'System\Certificates::download/$1', ['as' => 'system.certificates.download']);
        });

        // Ruta de usuarios.
        $routes->group('usuarios', static function ($routes) {
            $routes->post('nuevo', 'System\Users::create', ['as' => 'system.users.create']);
        });
    });

    // Ruta por defecto.
    $routes->addRedirect('', 'system.certificates.index', 301);
});

/**
 * Definición de rutas del backend.
 */
$routes->group('backend', static function ($routes) {
    // Definición de rutas de inicio de sesión.
    $routes->group('login', ['filter' => 'authredirect'], static function ($routes) {
        $routes->get('', 'Backend\Auth::login', ['as' => 'backend.auth.login']);
        $routes->post('', 'Backend\Auth::login', ['as' => 'backend.auth.login', 'filter' => 'formsrates']);
        $routes->get('olvidado', 'Backend\Auth::forgotten', ['as' => 'backend.auth.forgotten']);
        $routes->post('olvidado', 'Backend\Auth::forgotten', ['as' => 'backend.auth.forgotten', 'filter' => 'formsrates']);
        $routes->get('recuperacion/(:num)/(:hash)', 'Backend\Auth::recovery/$1/$2', ['as' => 'backend.auth.recovery']);
        $routes->post('recuperacion/(:num)/(:hash)', 'Backend\Auth::recovery/$1/$2', ['as' => 'backend.auth.recovery', 'filter' => 'formsrates']);
    });

    $routes->group('', ['filter' => 'auth'], static function ($routes) {
        // Ruta de cierre de sesión
        $routes->get('logout', 'Backend\Auth::logout', ['as' => 'backend.auth.logout']);

        // Definición de rutas de la cuenta del usuario de sesión.
        $routes->match(['get', 'post'], 'cuenta', 'Backend\Account::update', ['as' => 'backend.account.update']);

        // Definición de rutas de configuración del backend.
        $routes->group('configuraciones', ['filter' => 'isadmin'], static function ($routes) {
            $routes->get('', 'Backend\Settings::index', ['as' => 'backend.settings.index']);
            $routes->match(['get', 'post'], 'modificar', 'Backend\Settings::update', ['as' => 'backend.settings.update']);
        });

        // Definición de rutas de administración de usuarios al backend.
        $routes->group('usuarios', ['filter' => 'isadmin'], static function ($routes) {
            $routes->match(['get', 'post'], 'nuevo', 'Backend\Users::create', ['as' => 'backend.users.create']);
            $routes->get('', 'Backend\Users::index', ['as' => 'backend.users.index']);
            $routes->match(['get', 'post'], 'modificar/(:num)', 'Backend\Users::update/$1', ['as' => 'backend.users.update']);
            $routes->post('alternar-cuenta/(:num)', 'Backend\Users::toggleActive/$1', ['as' => 'backend.users.toggleActive']);
            $routes->post('eliminar/(:num)', 'Backend\Users::delete/$1', ['as' => 'backend.users.delete']);
        });

        // Definición de rutas de todos los módulos del backend.
        $routes->group('modulos', static function ($routes) {
            // Definición de rutas del módulo de prospectos.
            $routes->group('prospectos', static function ($routes) {
                $routes->match(['get', 'post'], 'nuevo', 'Backend\Modules\Prospects::create', ['as' => 'backend.modules.prospects.create']);
                $routes->get('', 'Backend\Modules\Prospects::index', ['as' => 'backend.modules.prospects.index']);
                $routes->get('(:num)', 'Backend\Modules\Prospects::show/$1', ['as' => 'backend.modules.prospects.show']);
                $routes->match(['get', 'post'], 'modificar/(:num)', 'Backend\Modules\Prospects::update/$1', ['as' => 'backend.modules.prospects.update']);
                $routes->post('eliminar/(:num)', 'Backend\Modules\Prospects::delete/$1', ['as' => 'backend.modules.prospects.delete']);
                $routes->get('descargar', 'Backend\Modules\Prospects::download', ['as' => 'backend.modules.prospects.download']);
            });
        });

        // Ruta por defecto.
        $routes->addRedirect('', 'backend.modules.prospects.index', 301);
    });
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
