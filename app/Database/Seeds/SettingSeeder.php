<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Seeder que inicializa la tabla de configuraciones.
 */
class SettingSeeder extends Seeder
{
    public function run()
    {
        helper('setting');

        setting()->get('App.general', 'company') ?? setting()->set('App.general', 'HSM Sistemas de Metrología', 'company');

        // setting()->get('App.general', 'phones') ?? setting()->set('App.general', '', 'phones');

        setting()->get('App.general', 'theme') ?? setting()->set('App.general', 'bumblebee', 'theme');

        setting()->get('App.general', 'favicon') ?? setting()->set('App.general', 'favicon.svg', 'favicon');

        setting()->get('App.general', 'background') ?? setting()->set('App.general', 'background.webp', 'background');

        setting()->get('App.general', 'logo') ?? setting()->set('App.general', 'logo.webp', 'logo');

        // setting()->get('App.emails', 'to') ?? setting()->set('App.emails', 'pruebas@genotipo.com', 'to');
    }
}
