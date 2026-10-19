<?php
// Guardián de rutas: se incluye al inicio de las páginas protegidas.
// requerir_login()  -> cualquier usuario autenticado
// requerir_rol()    -> solo usuarios con ese rol (ej. 'admin')
require_once __DIR__ . '/sesion.php';

function requerir_login(string $base_ruta = ''): void
{
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: ' . $base_ruta . 'login.php?error=acceso_denegado');
        exit;
    }
}

function requerir_rol(string $rol_requerido, string $base_ruta = ''): void
{
    requerir_login($base_ruta);
    if (($_SESSION['rol'] ?? '') !== $rol_requerido) {
        header('Location: ' . $base_ruta . 'mi-cuenta.php?error=sin_permiso');
        exit;
    }
}
