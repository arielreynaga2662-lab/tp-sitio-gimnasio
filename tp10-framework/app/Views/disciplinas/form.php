<?= $this->extend('layouts/main') ?>

<?= $this->section('contenido') ?>
<?php
// ============================================================
// TP10 - Vista del framework: formulario de disciplina
// (compartido por "nueva" y "editar").
// Recibe: $titulo, $accion, $disciplina, $errores
// ============================================================
?>
<div class="row justify-content-center">
  <div class="col-lg-6">
    <h1 class="h3 mb-4"><?= esc($titulo) ?></h1>

    <?php if (!empty($errores)): ?>
      <div class="alert alert-danger">
        <ul class="mb-0">
          <?php foreach ($errores as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url($accion) ?>">
      <div class="mb-3">
        <label class="form-label" for="nombre">Nombre</label>
        <input
          type="text"
          class="form-control"
          id="nombre"
          name="nombre"
          value="<?= esc(old('nombre', $disciplina['nombre'])) ?>"
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
        ><?= esc(old('descripcion', $disciplina['descripcion'] ?? '')) ?></textarea>
      </div>
      <div class="d-flex gap-2">
        <button type="submit" class="btn btn-danger">Guardar</button>
        <a href="<?= base_url('disciplinas') ?>" class="btn btn-outline-light"
          >Cancelar</a
        >
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>
