<?php
// Lee el archivo .env del proyecto y carga cada variable en $_ENV
$archivo_env = dirname(__DIR__) . '/.env';

if (is_readable($archivo_env)) {
    $lineas = file($archivo_env, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lineas as $linea) {
        $linea = trim($linea);
        if ($linea === '' || str_starts_with($linea, '#')) {
            continue;
        }
        [$nombre, $valor] = explode('=', $linea, 2);
        $_ENV[trim($nombre)] = trim($valor);
    }
}