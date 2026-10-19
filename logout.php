<?php
// Cierre de sesión: limpia $_SESSION, borra la cookie y destruye la sesión.
require_once __DIR__ . '/includes/sesion.php';

$_SESSION = [];

if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

session_destroy();

header('Location: login.php?status=logout');
exit;
