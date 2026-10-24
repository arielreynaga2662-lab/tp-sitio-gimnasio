<?php
// ============================================================
// TP9 - Endpoint JSON: búsqueda de planes (AJAX)
// GET api/buscar_planes.php?q=texto
// Responde { "status": "success", "data": [...] } en JSON puro,
// sin HTML: el frontend lo consume con Fetch API.
// ============================================================

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../config/conexion.php';

// Solo aceptamos GET: cualquier otro método devuelve 405.
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode([
        'status'  => 'error',
        'message' => 'Método no permitido. Usá GET.',
    ]);
    exit;
}

$busqueda = isset($_GET['q']) ? trim($_GET['q']) : '';

// Filtro simple de entrada: limitamos el largo de la búsqueda.
if (mb_strlen($busqueda) > 100) {
    http_response_code(400);
    echo json_encode([
        'status'  => 'error',
        'message' => 'La búsqueda es demasiado larga (máximo 100 caracteres).',
    ]);
    exit;
}

try {
    if ($busqueda !== '') {
        // Consulta preparada: el dato del usuario viaja separado del SQL.
        $stmt = $pdo->prepare(
            'SELECT id, nombre, precio_mensual, descripcion
               FROM planes
              WHERE nombre LIKE :q1 OR descripcion LIKE :q2
              ORDER BY id ASC'
        );
        $like = '%' . $busqueda . '%';
        $stmt->execute([':q1' => $like, ':q2' => $like]);
    } else {
        // Sin búsqueda devolvemos todos los planes.
        $stmt = $pdo->query(
            'SELECT id, nombre, precio_mensual, descripcion
               FROM planes
              ORDER BY id ASC'
        );
    }

    $planes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    http_response_code(200);
    echo json_encode(
        [
            'status' => 'success',
            'total'  => count($planes),
            'data'   => $planes,
        ],
        JSON_UNESCAPED_UNICODE
    );
} catch (PDOException $e) {
    error_log('Error en api/buscar_planes.php: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'status'  => 'error',
        'message' => 'Error al consultar la base de datos.',
    ]);
}
