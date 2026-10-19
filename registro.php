<?php
$base_ruta     = '';
$titulo_pagina = 'Crear cuenta';
$pagina_actual = 'registro';
require_once 'includes/sesion.php';
require_once 'config/conexion.php';

// Si ya hay una sesión iniciada, el registro no aplica
if (isset($_SESSION['usuario_id'])) {
    header('Location: mi-cuenta.php');
    exit;
}

$errores = [];
$valores = ['nombre' => '', 'apellido' => '', 'email' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valores['nombre']   = trim($_POST['nombre'] ?? '');
    $valores['apellido'] = trim($_POST['apellido'] ?? '');
    $valores['email']    = trim($_POST['email'] ?? '');
    $password            = $_POST['password'] ?? '';

    if ($valores['nombre'] === '') {
        $errores[] = 'El nombre es obligatorio.';
    }
    if ($valores['apellido'] === '') {
        $errores[] = 'El apellido es obligatorio.';
    }
    if (!filter_var($valores['email'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'Ingresá un email válido.';
    }
    if (strlen($password) < 6) {
        $errores[] = 'La contraseña debe tener al menos 6 caracteres.';
    }

    // Verificar que el email no exista ya en la base
    if (empty($errores)) {
        try {
            $stmt = $pdo->prepare('SELECT id FROM usuarios WHERE email = :email');
            $stmt->execute([':email' => $valores['email']]);
            if ($stmt->fetch()) {
                $errores[] = 'Ese email ya está registrado. Probá iniciar sesión.';
            }
        } catch (PDOException $e) {
            error_log('Error al verificar email: ' . $e->getMessage());
            $errores[] = 'No pudimos procesar el registro. Intentá de nuevo.';
        }
    }

    if (empty($errores)) {
        try {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare(
                'INSERT INTO usuarios (nombre, apellido, email, password, rol)
                 VALUES (:nombre, :apellido, :email, :password, :rol)'
            );
            $stmt->execute([
                ':nombre'   => $valores['nombre'],
                ':apellido' => $valores['apellido'],
                ':email'    => $valores['email'],
                ':password' => $hash,
                ':rol'      => 'usuario',
            ]);
            header('Location: login.php?status=registrado');
            exit;
        } catch (PDOException $e) {
            error_log('Error al registrar usuario: ' . $e->getMessage());
            $errores[] = 'No pudimos crear la cuenta. Intentá de nuevo.';
        }
    }
}

require_once 'includes/header.php';
require_once 'includes/nav.php';
?>

    <main id="contenido">
      <section class="seccion">
        <div class="container" style="max-width: 640px">
          <div class="text-center mb-4">
            <p class="etiqueta">Sumate a Zonafit</p>
            <h2 class="subtitulo">Crear cuenta</h2>
            <p>Registrate para acceder a tu panel de socio.</p>
          </div>

          <?php if ($errores): ?>
            <div class="alert alert-danger" role="alert">
              <strong>Revisá estos datos:</strong>
              <ul class="mb-0">
                <?php foreach ($errores as $error): ?>
                  <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <form class="formulario" method="POST" action="registro.php" novalidate>
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre *</label>
                <input
                  type="text"
                  class="form-control"
                  id="nombre"
                  name="nombre"
                  value="<?= htmlspecialchars($valores['nombre']) ?>"
                  required
                />
              </div>
              <div class="col-md-6">
                <label for="apellido" class="form-label">Apellido *</label>
                <input
                  type="text"
                  class="form-control"
                  id="apellido"
                  name="apellido"
                  value="<?= htmlspecialchars($valores['apellido']) ?>"
                  required
                />
              </div>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email *</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                value="<?= htmlspecialchars($valores['email']) ?>"
                required
              />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña * (mínimo 6 caracteres)</label>
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                required
              />
            </div>
            <button type="submit" class="btn btn-zona w-100">
              Registrarme
            </button>
          </form>

          <p class="text-center mt-4 mb-0">
            ¿Ya tenés cuenta?
            <a href="login.php">Iniciá sesión</a>
          </p>
        </div>
      </section>
    </main>

<?php require_once 'includes/footer.php'; ?>
