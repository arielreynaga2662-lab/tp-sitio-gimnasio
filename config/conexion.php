<?php
// ============================================================
// TP7 - Conexión PDO a la base de datos zonafit_gym
// Lee las credenciales desde .env (igual que el resto del sitio)
// ============================================================

require_once __DIR__ . '/env.php';

$host    = $_ENV['DB_HOST'] ?? '127.0.0.1';
$port    = $_ENV['DB_PORT'] ?? '3306';
$db      = $_ENV['DB_NAME'] ?? 'zonafit_gym';
$user    = $_ENV['DB_USER'] ?? 'root';
$pass    = $_ENV['DB_PASS'] ?? '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

$options = [
    // Los errores de SQL lanzan excepciones PDOException
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    // fetch() devuelve arrays asociativos
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // Sentencias preparadas reales del motor (anti inyección SQL)
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // No mostramos el detalle real (puede exponer datos del servidor):
    // se registra en el log de Apache y se muestra un mensaje genérico.
    error_log('Error de conexión BD: ' . $e->getMessage());
    die('Error crítico de conexión con la base de datos.');
}
?>
