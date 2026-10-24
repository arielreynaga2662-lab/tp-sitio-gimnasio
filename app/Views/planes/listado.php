<?php
// ============================================================
// TP10 - Vista: listado de planes (solo marcado HTML)
// Recibe del controlador: $planes, $error, $status
// ============================================================
$base_ruta     = '../';
$titulo_pagina = 'Administrar planes';
$pagina_actual = 'admin';
require_once __DIR__ . '/../../../includes/header.php';
require_once __DIR__ . '/../../../includes/nav.php';

// Mensajes de estado según lo que vino de crear/editar/eliminar
$mensajes = [
    'creado'    => 'El plan se creó correctamente.',
    'editado'   => 'El plan se actualizó correctamente.',
    'eliminado' => 'El plan se eliminó correctamente.',
];
?>

    <main id="contenido">
      <section class="seccion">
        <div class="container">
          <div class="text-center mb-5">
            <p class="etiqueta">Panel de administración</p>
            <h2>Planes de membresía</h2>
            <p class="subtitulo">
              Altas, bajas y modificaciones de los planes del gimnasio.
            </p>
          </div>

          <?php if (isset($mensajes[$status])): ?>
            <p class="alert alert-success">
              <?= htmlspecialchars($mensajes[$status]) ?>
            </p>
          <?php endif; ?>

          <?php if ($error): ?>
            <p class="alert alert-danger"><?= htmlspecialchars($error) ?></p>
          <?php endif; ?>

          <a href="crear.php" class="btn btn-zona mb-4">
            <i class="bi bi-plus-circle" aria-hidden="true"></i> Nuevo plan
          </a>

          <div class="table-responsive">
            <table class="table table-dark tabla-horarios align-middle">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Precio mensual</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($planes as $plan): ?>
                  <tr>
                    <td><?= htmlspecialchars($plan['id']) ?></td>
                    <td><?= htmlspecialchars($plan['nombre']) ?></td>
                    <td>$<?= htmlspecialchars(number_format((float) $plan['precio_mensual'], 2, ',', '.')) ?></td>
                    <td><?= htmlspecialchars($plan['descripcion'] ?? '') ?></td>
                    <td>
                      <a
                        href="editar.php?id=<?= (int) $plan['id'] ?>"
                        class="btn btn-sm btn-outline-light"
                        >Editar</a
                      >
                      <a
                        href="eliminar.php?id=<?= (int) $plan['id'] ?>"
                        class="btn btn-sm btn-outline-danger"
                        onclick="return confirm('¿Eliminar el plan &quot;<?= htmlspecialchars($plan['nombre']) ?>&quot;?')"
                        >Eliminar</a
                      >
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </main>

<?php require_once __DIR__ . '/../../../includes/footer.php'; ?>
