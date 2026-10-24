<?php
// ============================================================
// TP10 - Vista: formulario de plan (compartida por crear/editar)
// Recibe del controlador: $errores, $valores, $titulo_pagina,
// $accion (archivo destino del POST) e $id (0 si es nuevo)
// ============================================================
$base_ruta     = '../';
$pagina_actual = 'admin';
require_once __DIR__ . '/../../../includes/header.php';
require_once __DIR__ . '/../../../includes/nav.php';
?>

    <main id="contenido">
      <section class="seccion">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="text-center mb-4">
                <p class="etiqueta">Panel de administración</p>
                <h2><?= htmlspecialchars($titulo_pagina) ?></h2>
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

              <form class="formulario" method="POST" action="<?= htmlspecialchars($accion) ?>" novalidate>
                <?php if ($id > 0): ?>
                  <input type="hidden" name="id" value="<?= (int) $id ?>" />
                <?php endif; ?>
                <div class="mb-3">
                  <label class="form-label" for="nombre">Nombre del plan</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nombre"
                    name="nombre"
                    placeholder="Ej: Plan Anual"
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
                    placeholder="Ej: 50000"
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
                    placeholder="Qué incluye el plan..."
                  ><?= htmlspecialchars($valores['descripcion']) ?></textarea>
                </div>
                <div class="d-flex gap-2">
                  <button type="submit" class="btn btn-zona">Guardar plan</button>
                  <a href="index.php" class="btn btn-outline-light">Cancelar</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php require_once __DIR__ . '/../../../includes/footer.php'; ?>
