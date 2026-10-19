<?php
$base_ruta     = '';
$titulo_pagina = 'Iniciar sesión';
$pagina_actual = 'login';
require_once 'includes/sesion.php';
require_once 'config/conexion.php';

// Si ya hay una sesión iniciada, directo al panel
if (isset($_SESSION['usuario_id'])) {
    header('Location: mi-cuenta.php');
    exit;
}

$error   = '';
$mensaje = '';
$email   = '';

if (($_GET['status'] ?? '') === 'registrado') {
    $mensaje = 'Tu cuenta se creó correctamente. Ya podés iniciar sesión.';
}
if (($_GET['status'] ?? '') === 'logout') {
    $mensaje = 'Cerraste sesión correctamente.';
}
if (($_GET['error'] ?? '') === 'acceso_denegado') {
    $error = 'Tenés que iniciar sesión para entrar a esa página.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $error = 'Completá email y contraseña.';
    } else {
        try {
            $stmt = $pdo->prepare(
                'SELECT id, nombre, apellido, email, password, rol
                 FROM usuarios WHERE email = :email'
            );
            $stmt->execute([':email' => $email]);
            $usuario = $stmt->fetch();
        } catch (PDOException $e) {
            error_log('Error al buscar usuario: ' . $e->getMessage());
            $usuario = false;
            $error   = 'No pudimos procesar el ingreso. Intentá de nuevo.';
        }

        if ($usuario && password_verify($password, $usuario['password'])) {
            // Credenciales correctas: nueva sesión protegida contra fijación
            session_regenerate_id(true);
            $_SESSION['usuario_id']     = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'] . ' ' . $usuario['apellido'];
            $_SESSION['rol']            = $usuario['rol'];

            if ($usuario['rol'] === 'admin') {
                header('Location: admin/index.php');
            } else {
                header('Location: mi-cuenta.php');
            }
            exit;
        } elseif (!$error) {
            // Mensaje genérico: no se revela si falló el email o la contraseña
            $error = 'Email o contraseña incorrectos.';
        }
    }
}

require_once 'includes/header.php';
require_once 'includes/nav.php';
?>

    <main id="contenido">
      <section class="seccion">
        <div class="container" style="max-width: 480px">
          <div class="text-center mb-4">
            <p class="etiqueta">Socios y staff</p>
            <h2 class="subtitulo">Iniciar sesión</h2>
          </div>

          <?php if ($mensaje): ?>
            <div class="alerta-ok" role="alert"><?= htmlspecialchars($mensaje) ?></div>
          <?php endif; ?>
          <?php if ($error): ?>
            <div class="alert alert-danger" role="alert">
              <?= htmlspecialchars($error) ?>
            </div>
          <?php endif; ?>

          <form class="formulario" method="POST" action="login.php" novalidate>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                value="<?= htmlspecialchars($email) ?>"
                required
              />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                required
              />
            </div>
            <button type="submit" class="btn btn-zona w-100">
              Iniciar sesión
            </button>
          </form>

          <p class="text-center mt-4 mb-0">
            ¿Todavía no tenés cuenta?
            <a href="registro.php">Registrate acá</a>
          </p>
        </div>
      </section>
    </main>

<?php require_once 'includes/footer.php'; ?>
