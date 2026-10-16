<?php
$titulo_pagina = "Equipo";
$pagina_actual = "equipo";
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>

    <main id="contenido">
      <section id="equipo" class="seccion">
        <div class="container">
          <div class="text-center mb-5">
            <p class="etiqueta">Staff</p>
            <h2>Entrenadores / Equipo</h2>
            <p class="subtitulo">
              Profesionales capacitados para guiarte en cada paso hacia tu mejor
              versión física.
            </p>
          </div>
          <div class="row g-4 text-center">
            <div class="col-6 col-lg-3">
              <img
                class="foto-equipo"
                src="img/entrenador-juan.jpg"
                alt="Retrato de Juan Pérez"
                width="400"
                height="400"
                loading="lazy"
              />
              <h3 class="h5 mt-3 mb-1">Juan Pérez</h3>
              <p class="rol">Especialista en Musculación</p>
            </div>
            <div class="col-6 col-lg-3">
              <img
                class="foto-equipo"
                src="img/entrenadora-maria.jpg"
                alt="Retrato de María García"
                width="400"
                height="400"
                loading="lazy"
              />
              <h3 class="h5 mt-3 mb-1">María García</h3>
              <p class="rol">Entrenamiento Funcional</p>
            </div>
            <div class="col-6 col-lg-3">
              <img
                class="foto-equipo"
                src="img/entrenador-esteban.jpg"
                alt="Retrato de Esteban Russo"
                width="400"
                height="400"
                loading="lazy"
              />
              <h3 class="h5 mt-3 mb-1">Esteban Russo</h3>
              <p class="rol">Spinning &amp; Cardio</p>
            </div>
            <div class="col-6 col-lg-3">
              <img
                class="foto-equipo"
                src="img/entrenadora-ana.jpg"
                alt="Retrato de Ana Belén"
                width="400"
                height="400"
                loading="lazy"
              />
              <h3 class="h5 mt-3 mb-1">Ana Belén</h3>
              <p class="rol">Nutricionista Deportiva</p>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php require_once 'includes/footer.php'; ?>