<?php

use CodeIgniter\I18n\Time;

/**
 * Elimina todos los espacios sobrantes de un string.
 */
function trimAll(?string $str)
{
    return trim(preg_replace('/\s+/', ' ', $str ?? ''));
}

/**
 * Elimina todos los espacios de un string.
 */
function stripAllSpaces(?string $str)
{
    return preg_replace('/\s+/', '', $str ?? '');
}

/**
 * Convierte un string a minúsculas.
 */
function lowerCase(?string $str)
{
    return mb_strtolower($str ?? '');
}

/**
 * Humaniza una fecha.
 */
function format_date_humanize(string $date)
{
    return Time::parse($date)->toLocalizedString('dd MMMM, YYYY - hh:mm a');
}

/**
 * Valida si la URL actual es hijo de la URL del nombre de una ruta.
 */
function url_is_child(string $routeName)
{
    $path = single_service('uri', url_to($routeName))->getPath();

    return url_is($path . '*');
}
