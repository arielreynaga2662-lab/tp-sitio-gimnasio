<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= esc($titulo ?? 'Disciplinas') ?> | Extreme Gym</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
  </head>
  <body class="bg-dark text-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
      <div class="container">
        <a class="navbar-brand fw-bold" href="<?= base_url('disciplinas') ?>">
          EXTREME GYM - Disciplinas
        </a>
        <span class="navbar-text">Módulo del framework (TP10)</span>
      </div>
    </nav>

    <main class="container py-4">
      <?= $this->renderSection('contenido') ?>
    </main>
  </body>
</html>
