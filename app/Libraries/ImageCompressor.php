<?php

namespace App\Libraries;

use CodeIgniter\Files\File;
use RuntimeException;
use Tinify;

/**
 * Comprime imágenes utilizando la API de Tinify.
 */
class ImageCompressor
{
    private static $instance;

    /**
     * Valida la conexión con la API.
     */
    private function __construct()
    {
        if (ENVIRONMENT === 'production') {
            try {
                Tinify\setKey(env('TINIFY_API_KEY'));
                Tinify\validate();
            } catch (Tinify\Exception $e) {
                throw new RuntimeException($e->getMessage());
            }
        }
    }

    /**
     * Singleton.
     */
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Comprime una imagen.
     */
    public static function run(string $source)
    {
        if (ENVIRONMENT === 'production') {
            $ext = (new File($source))->guessExtension();

            if ($ext && $ext !== 'svg') {
                Tinify\fromFile($source)->toFile($source);
            }
        }
    }
}
