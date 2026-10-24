<?php
// ============================================================
// TP10 - admin/editar.php: punto de entrada de la edición.
// Protege la ruta y delega todo al Controlador (MVC nativo).
// ============================================================
$base_ruta = '../';
require_once '../includes/auth_guard.php';
requerir_rol('admin', $base_ruta);

require_once '../config/conexion.php';
require_once '../app/Controllers/PlanController.php';

$controlador = new PlanController($pdo);
$controlador->editar();
