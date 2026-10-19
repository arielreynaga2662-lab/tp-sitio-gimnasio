  <?php
// Devuelve "active" si el enlace es de la página que se está mostrando
function activo($pagina)
{
    global $pagina_actual;
    return $pagina === $pagina_actual ? 'active' : '';
}
?>
  <!-- 1. ENCABEZADO / MENÚ -->
    <header>
      <nav
        class="navbar navbar-expand-lg fixed-top"
        aria-label="Menú principal"
      >
        <div class="container">
          <a class="navbar-brand" href="<?= $base_ruta ?>index.php">
            <img
              src="<?= $base_ruta ?>img/logo-extreme.png"
              alt="Extreme Gym"
              class="logo-nav"
            />
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menu"
            aria-controls="menu"
            aria-expanded="false"
            aria-label="Abrir menú"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link <?= activo('inicio') ?>" href="<?= $base_ruta ?>index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= $base_ruta ?>index.php#galeria">Grupo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= $base_ruta ?>index.php#disciplinas">Entrenamientos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= activo('planes') ?>" href="<?= $base_ruta ?>planes.php">Planes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= $base_ruta ?>planes.php#horarios">Horarios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= activo('equipo') ?>" href="<?= $base_ruta ?>equipo.php">Equipo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= activo('contacto') ?>" href="<?= $base_ruta ?>contacto.php">Contacto</a>
              </li>
              <?php if (isset($_SESSION['usuario_id'])): ?>
                <li class="nav-item">
                  <a class="nav-link <?= activo('cuenta') ?>" href="<?= $base_ruta ?>mi-cuenta.php">Mi cuenta</a>
                </li>
                <?php if (($_SESSION['rol'] ?? '') === 'admin'): ?>
                  <li class="nav-item">
                    <a class="nav-link <?= activo('admin') ?>" href="<?= $base_ruta ?>admin/index.php">Admin</a>
                  </li>
                <?php endif; ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?= $base_ruta ?>logout.php">Cerrar sesión</a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link <?= activo('login') ?>" href="<?= $base_ruta ?>login.php">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?= activo('registro') ?>" href="<?= $base_ruta ?>registro.php">Registrarse</a>
                </li>
              <?php endif; ?>
            </ul>
            <a class="btn btn-zona ms-lg-3" href="<?= $base_ruta ?>planes.php#planes">Empezar ahora</a>
          </div>
        </div>
      </nav>
    </header>