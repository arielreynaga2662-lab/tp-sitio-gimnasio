<?php
$base_ruta     = '';
$titulo_pagina = 'Mi cuenta';
$pagina_actual = 'cuenta';
require_once 'includes/auth_guard.php';
requerir_login($base_ruta);

require_once 'config/conexion.php';

// Datos del usuario logueado, traídos de la base
$stmt = $pdo->prepare(
    'SELECT nombre, apellido, email, rol, created_at
     FROM usuarios WHERE id = :id'
);
$stmt->execute([':id' => $_SESSION['usuario_id']]);
$usuario = $stmt->fetch();

$aviso = ($_GET['error'] ?? '') === 'sin_permiso'
    ? 'Esa sección es solo para administradores.'
    : '';

require_once 'includes/header.php';
require_once 'includes/nav.php';
?>

    <main id="contenido">
      <section class="seccion">
        <div class="container" style="max-width: 640px">
          <div class="text-center mb-4">
            <p class="etiqueta">Panel de socio</p>
            <h2 class="subtitulo">Mi cuenta</h2>
            <p>Hola, <?= htmlspecialchars($_SESSION['usuario_nombre']) ?>.</p>
          </div>

          <?php if ($aviso): ?>
            <div class="alert alert-danger" role="alert">
              <?= htmlspecialchars($aviso) ?>
            </div>
          <?php endif; ?>

          <?php if ($usuario): ?>
            <div class="table-responsive">
              <table class="table table-dark tabla-horarios align-middle">
                <tbody>
                  <tr>
                    <th scope="row">Nombre</th>
                    <td><?= htmlspecialchars($usuario['nombre'] . ' ' . $usuario['apellido']) ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Email</th>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Rol</th>
                    <td><?= htmlspecialchars($usuario['rol']) ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Socio desde</th>
                    <td><?= htmlspecialchars(date('d/m/Y', strtotime($usuario['created_at']))) ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          <?php endif; ?>

          <div class="d-flex gap-3 justify-content-center mt-4">
            <?php if ($usuario['rol'] === 'admin'): ?>
              <a href="admin/index.php" class="btn btn-zona">Ir al panel admin</a>
            <?php endif; ?>
            <a href="logout.php" class="btn btn-outline-light">Cerrar sesión</a>
          </div>
        </div>
      </section>
    </main>

<?php require_once 'includes/footer.php'; ?>
