<?php
$base_ruta       = '../';
$titulo_pagina   = 'Editar plan';
$pagina_actual   = 'admin';

require_once '../includes/auth_guard.php';
requerir_rol('admin', $base_ruta);

require_once '../config/conexion.php';

$id = (int) ($_GET['id'] ?? $_POST['id'] ?? 0);

// Busca el plan a editar con consulta preparada
try {
    $stmt = $pdo->prepare(
        'SELECT id, nombre, precio_mensual, descripcion FROM planes WHERE id = :id'
    );
    $stmt->execute([':id' => $id]);
    $plan = $stmt->fetch();
} catch (PDOException $e) {
    error_log('Error al buscar plan: ' . $e->getMessage());
    $plan = false;
}

if (!$plan) {
    header('Location: index.php');
    exit;
}

$errores = [];
$valores = [
    'nombre'         => $plan['nombre'],
    'precio_mensual' => $plan['precio_mensual'],
    'descripcion'    => $plan['descripcion'] ?? '',
];

// UPDATE: actualiza el plan con consulta preparada
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valores['nombre']         = trim($_POST['nombre'] ?? '');
    $valores['precio_mensual'] = trim($_POST['precio_mensual'] ?? '');
    $valores['descripcion']    = trim($_POST['descripcion'] ?? '');

    if ($valores['nombre'] === '') {
        $errores[] = 'El nombre es obligatorio.';
    }
    if ($valores['precio_mensual'] === '') {
        $errores[] = 'El precio mensual es obligatorio.';
    } elseif (!is_numeric($valores['precio_mensual']) || $valores['precio_mensual'] < 0) {
        $errores[] = 'El precio mensual debe ser un número mayor o igual a 0.';
    }

    if (empty($errores)) {
        try {
            $sql  = 'UPDATE planes
                     SET nombre = :nombre,
                         precio_mensual = :precio,
                         descripcion = :descripcion
                     WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nombre'      => $valores['nombre'],
                ':precio'      => $valores['precio_mensual'],
                ':descripcion' => $valores['descripcion'],
                ':id'          => $id,
            ]);
            header('Location: index.php?status=editado');
            exit;
        } catch (PDOException $e) {
            error_log('Error al editar plan: ' . $e->getMessage());
            $errores[] = 'No se pudo actualizar el plan.';
        }
    }
}

require_once '../includes/header.php';
require_once '../includes/nav.php';
?>

    <main id="contenido">
      <section class="seccion">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="text-center mb-4">
                <p class="etiqueta">Panel de administración</p>
                <h2>Editar plan</h2>
              </div>

              <?php if (!empty($errores)): ?>
                <div class="alert alert-danger">
                  <p class="mb-1"><strong>Revisá estos errores:</strong></p>
                  <ul class="mb-0">
                    <?php foreach ($errores as $error): ?>
                      <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              <?php endif; ?>

              <form class="formulario" method="POST" action="editar.php" novalidate>
                <input type="hidden" name="id" value="<?= (int) $id ?>" />
                <div class="mb-3">
                  <label class="form-label" for="nombre">Nombre del plan</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nombre"
                    name="nombre"
                    value="<?= htmlspecialchars($valores['nombre']) ?>"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="precio_mensual"
                    >Precio mensual</label
                  >
                  <input
                    type="number"
                    step="0.01"
                    min="0"
                    class="form-control"
                    id="precio_mensual"
                    name="precio_mensual"
                    value="<?= htmlspecialchars($valores['precio_mensual']) ?>"
                    required
                  />
                </div>
                <div class="mb-4">
                  <label class="form-label" for="descripcion">Descripción</label>
                  <textarea
                    class="form-control"
                    id="descripcion"
                    name="descripcion"
                    rows="3"
                  ><?= htmlspecialchars($valores['descripcion']) ?></textarea>
                </div>
                <div class="d-flex gap-2">
                  <button type="submit" class="btn btn-zona">
                    Guardar cambios
                  </button>
                  <a href="index.php" class="btn btn-outline-light">Cancelar</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php require_once '../includes/footer.php'; ?>
