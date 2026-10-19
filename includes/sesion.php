<?php
// Inicia la sesión una sola vez, con cookie de sesión segura.
// Se incluye en todas las páginas que usan $_SESSION.
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,        // solo hasta cerrar el navegador
        'path'     => '/',
        'secure'   => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',
        'httponly' => true,     // la cookie no se puede leer desde JavaScript
        'samesite' => 'Lax',
    ]);
    session_start();
}
