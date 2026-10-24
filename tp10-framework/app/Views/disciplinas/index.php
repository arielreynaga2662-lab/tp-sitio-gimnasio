<?= $this->extend('layouts/main') ?>

<?= $this->section('contenido') ?>
<?php
// ============================================================
// TP10 - Vista del framework: listado de disciplinas.
// Usa el motor de plantillas de CI4 (extend + section).
// Recibe: $disciplinas, $mensaje
// ============================================================
?>
<div class="d-flex justify-content-between align-items-center mb-4">
  <h1 class="h3 mb-0">Disciplinas del gimnasio</h1>
  <a href="<?= base_url('disciplinas/nueva') ?>" class="btn btn-danger">
    <i class="bi bi-plus-circle"></i> Nueva disciplina
  </a>
</div>

<?php if ($mensaje): ?>
  <div class="alert alert-success"><?= esc($mensaje) ?></div>
<?php endif; ?>

<div class="table-responsive">
  <table class="table table-dark table-striped align-middle">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($disciplinas as $disciplina): ?>
        <tr>
          <td><?= esc($disciplina['id']) ?></td>
          <td><?= esc($disciplina['nombre']) ?></td>
          <td><?= esc($disciplina['descripcion'] ?? '') ?></td>
          <td>
            <a
              href="<?= base_url('disciplinas/editar/' . $disciplina['id']) ?>"
              class="btn btn-sm btn-outline-light"
              >Editar</a
            >
            <a
              href="<?= base_url('disciplinas/borrar/' . $disciplina['id']) ?>"
              class="btn btn-sm btn-outline-danger"
              onclick="return confirm('¿Eliminar esta disciplina?')"
              >Eliminar</a
            >
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?= $this->endSection() ?>
