<?php
// ============================================================
// TP10 - Parte A: Modelo Plan (MVC nativo)
// Todas las consultas SQL del módulo viven acá, encapsuladas
// dentro de la clase. El controlador ya no escribe SQL:
// solo le pide datos al modelo.
// ============================================================

class Plan
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // READ: todos los planes
    public function todos(): array
    {
        $stmt = $this->pdo->query(
            'SELECT id, nombre, precio_mensual, descripcion
               FROM planes
              ORDER BY id ASC'
        );
        return $stmt->fetchAll();
    }

    // READ: un plan por id (consulta preparada)
    public function buscar(int $id): ?array
    {
        $stmt = $this->pdo->prepare(
            'SELECT id, nombre, precio_mensual, descripcion
               FROM planes
              WHERE id = :id'
        );
        $stmt->execute([':id' => $id]);
        $plan = $stmt->fetch();
        return $plan === false ? null : $plan;
    }

    // CREATE: inserta un plan (consulta preparada)
    public function crear(string $nombre, float $precio, string $descripcion): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO planes (nombre, precio_mensual, descripcion)
             VALUES (:nombre, :precio, :descripcion)'
        );
        $stmt->execute([
            ':nombre'      => $nombre,
            ':precio'      => $precio,
            ':descripcion' => $descripcion,
        ]);
    }

    // UPDATE: actualiza un plan (consulta preparada)
    public function actualizar(int $id, string $nombre, float $precio, string $descripcion): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE planes
                SET nombre = :nombre,
                    precio_mensual = :precio,
                    descripcion = :descripcion
              WHERE id = :id'
        );
        $stmt->execute([
            ':nombre'      => $nombre,
            ':precio'      => $precio,
            ':descripcion' => $descripcion,
            ':id'          => $id,
        ]);
    }

    // DELETE: borra un plan (consulta preparada)
    public function eliminar(int $id): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM planes WHERE id = :id');
        $stmt->execute([':id' => $id]);
    }
}
