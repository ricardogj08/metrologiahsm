<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Libraries\ImageCompressor;

class Settings extends BaseController
{
    /**
     * Renderiza la página de todas las configuraciones del backend.
     */
    public function index()
    {
        return view('backend/settings/index');
    }

    /**
     * Renderiza la página para editar las configuraciones del sitio web
     * y modifica las configuraciones del sitio web.
     */
    public function update()
    {
        // Tema de colores de daisyUI.
        $themes = [
            'light', 'dark', 'cupcake', 'bumblebee', 'emerald', 'corporate', 'synthwave', 'retro',
            'cyberpunk', 'valentine', 'halloween', 'garden', 'forest', 'aqua', 'lofi', 'pastel',
            'fantasy', 'wireframe', 'black', 'luxury', 'dracula', 'cmyk', 'autumn', 'business',
            'acid', 'lemonade', 'night', 'coffee', 'winter',
        ];

        $themesList = implode(',', $themes);

        // Valida los campos del formulario.
        if (! $this->request->is('post') || ! $this->validate([
            'company'                   => 'required|max_length[256]',
            'phones'                    => 'required|max_length[256]',
            'theme'                     => "permit_empty|in_list[{$themesList}]",
            'favicon'                   => 'permit_empty|uploaded[favicon]|max_size[favicon,4096]|is_image[favicon]',
            'background'                => 'permit_empty|uploaded[background]|max_size[background,4096]|is_image[background]',
            'logo'                      => 'permit_empty|uploaded[logo]|max_size[logo,4096]|is_image[logo]',
            'emailsTo'                  => 'required|max_length[4096]|valid_emails',
            'emailsCC'                  => 'permit_empty|max_length[4096]|valid_emails',
            'emailsBCC'                 => 'permit_empty|max_length[4096]|valid_emails',
            'whatsapp'                  => 'required|max_length[15]|numeric',
            'googleTagManager'          => 'if_exist|max_length[32]',
            'googleSearchConsole'       => 'permit_empty|uploaded[googleSearchConsole]|max_size[googleSearchConsole,8]|mime_in[googleSearchConsole,text/plain]|ext_in[googleSearchConsole,html]',
            'deleteGoogleSearchConsole' => 'if_exist|in_list[true]',
        ])) {
            return view('backend/settings/update', [
                'themes'       => $themes,
                'currentTheme' => setting()->get('App.general', 'theme'),
            ]);
        }

        // Modifica el nombre de la empresa.
        setting()->set('App.general', trimAll($this->request->getPost('company')), 'company');

        // Modifica los teléfonos de contacto.
        setting()->set('App.general', trimAll($this->request->getPost('phones')), 'phones');

        // Modifica el tema de colores.
        setting()->set('App.general', stripAllSpaces($this->request->getPost('theme')) ?: null, 'theme');

        // Define la ruta de los archivos subidos para las configuraciones del backend.
        $path = FCPATH . 'uploads/settings/';

        $compress = ImageCompressor::getInstance();

        $favicon = $this->request->getFile('favicon');

        // Modifica el favicon.
        if ($favicon->isValid() && ! $favicon->hasMoved()) {
            $oldFavicon = $path . setting()->get('App.general', 'favicon');

            // Elimina el favicon anterior.
            is_file($oldFavicon) && unlink($oldFavicon);

            $newFaviconName = $favicon->getRandomName();

            // Almacena el nuevo favicon.
            $favicon->move($path, $newFaviconName);

            setting()->set('App.general', $newFaviconName, 'favicon');

            $compress->run($path . $newFaviconName);

            unset($favicon, $oldFavicon, $newFaviconName);
        }

        $background = $this->request->getFile('background');

        // Modifica el fondo de inicio de sesión.
        if ($background->isValid() && ! $background->hasMoved()) {
            $oldBackground = $path . setting()->get('App.general', 'background');

            // Elimina el fondo anterior.
            is_file($oldBackground) && unlink($oldBackground);

            $newBackgroundName = $background->getRandomName();

            // Almacena el nuevo fondo.
            $background->move($path, $newBackgroundName);

            setting()->set('App.general', $newBackgroundName, 'background');

            // Comprime el nuevo logo.
            $compress->run($path . $newBackgroundName);

            unset($background, $oldBackground, $newBackgroundName);
        }

        $logo = $this->request->getFile('logo');

        // Modifica el logo.
        if ($logo->isValid() && ! $logo->hasMoved()) {
            $oldLogo = $path . setting()->get('App.general', 'logo');

            // Elimina el logo anterior.
            is_file($oldLogo) && unlink($oldLogo);

            $newLogoName = $logo->getRandomName();

            // Almacena el nuevo logo.
            $logo->move($path, $newLogoName);

            setting()->set('App.general', $newLogoName, 'logo');

            // Comprime el nuevo logo.
            $compress->run($path . $newLogoName);

            unset($logo, $oldLogo, $newLogoName);
        }

        // Modifica los emails de destino con copia oculta.
        setting()->set('App.emails', lowerCase(trimAll($this->request->getPost('emailsTo'))), 'to');

        // Modifica los emails de destino con copia.
        setting()->set('App.emails', lowerCase(trimAll($this->request->getPost('emailsCC'))) ?: null, 'cc');

        // Modifica los emails de destino con copia oculta.
        setting()->set('App.emails', lowerCase(trimAll($this->request->getPost('emailsBCC'))) ?: null, 'bcc');

        // Modifica el número de WhatsApp.
        setting()->set('App.apps', stripAllSpaces($this->request->getPost('whatsapp')), 'whatsapp');

        // Modifica el ID de Google Tag Manager.
        setting()->set('App.apps', stripAllSpaces($this->request->getPost('googleTagManager')) ?: null, 'google:tagManager');

        // Elimina el archivo de Google Search Console.
        if ($this->request->getPost('deleteGoogleSearchConsole')) {
            $file = FCPATH . setting()->get('App.apps', 'google:searchConsole');

            is_file($file) && unlink($file);

            setting()->set('App.apps', null, 'google:searchConsole');

            unset($file);
        }

        $googleSearchConsole = $this->request->getFile('googleSearchConsole');

        // Modifica la verificación de Google Search Console.
        if ($googleSearchConsole->isValid() && ! $googleSearchConsole->hasMoved()) {
            $oldGoogleSearchConsole = FCPATH . setting()->get('App.apps', 'google:searchConsole');

            // Elimina el archivo anterior.
            is_file($oldGoogleSearchConsole) && unlink($oldGoogleSearchConsole);

            // Almacena el nuevo archivo.
            $googleSearchConsole->move(FCPATH);

            setting()->set('App.apps', $googleSearchConsole->getName(), 'google:searchConsole');

            unset($googleSearchConsole, $oldGoogleSearchConsole);
        }

        return redirect()
            ->route('backend.settings.index')
            ->with('toast-success', 'El sitio web se ha modificado correctamente');
    }
}
