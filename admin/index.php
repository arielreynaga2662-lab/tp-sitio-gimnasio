<?php
// ============================================================
// TP10 - admin/index.php: ahora es solo el "punto de entrada".
// Protege la ruta y delega todo al Controlador (MVC nativo).
// ============================================================
$base_ruta = '../';
require_once '../includes/auth_guard.php';
requerir_rol('admin', $base_ruta);

require_once '../config/conexion.php';
require_once '../app/Controllers/PlanController.php';

$controlador = new PlanController($pdo);
$controlador->index();
