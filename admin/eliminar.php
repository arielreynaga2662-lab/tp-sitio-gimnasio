<?php
// DELETE: borra un plan por id con consulta preparada
require_once '../config/conexion.php';

$id = (int) ($_GET['id'] ?? 0);

if ($id > 0) {
    try {
        $stmt = $pdo->prepare('DELETE FROM planes WHERE id = :id');
        $stmt->execute([':id' => $id]);
    } catch (PDOException $e) {
        error_log('Error al eliminar plan: ' . $e->getMessage());
    }
}

header('Location: index.php?status=eliminado');
exit;
?>
