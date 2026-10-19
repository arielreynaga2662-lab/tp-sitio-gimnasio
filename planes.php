<?php
$titulo_pagina = "Planes y horarios";
$pagina_actual = "planes";
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>

    <main id="contenido">
      <!-- 6. PLANES Y PRECIOS -->
      <section id="planes" class="seccion">
        <div class="container">
          <div class="text-center mb-5">
            <p class="etiqueta">Membresías</p>
            <h2>Planes y precios</h2>
            <p class="subtitulo">
              Elegí la membresía que mejor se adapte a tu rutina y presupuesto.
            </p>
          </div>
          <div class="row g-4 align-items-center">
            <div class="col-md-4">
              <article class="plan h-100">
                <h3>Mensual</h3>
                <p class="plan-desc">
                  Ideal para quienes buscan flexibilidad inmediata sin
                  contratos.
                </p>
                <p class="precio">$40.000<span>/mes</span></p>
                <ul class="lista-plan">
                  <li>
                    <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                    Acceso libre a musculación
                  </li>
                  <li>
                    <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                    Pase libre a clases grupales
                  </li>
                  <li>
                    <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                    Plan de entrenamiento personalizado
                  </li>
                </ul>
                <a href="contacto.php" class="btn btn-outline-light w-100"
                  >Elegir plan <span class="visually-hidden">Mensual</span></a
                >
              </article>
            </div>
            <div class="col-md-4">
              <article class="plan plan-destacado h-100">
                <span class="badge-recomendado">Recomendado</span>
                <h3>Trimestral</h3>
                <p class="plan-desc">
                  El plan preferido para consolidar el hábito del entrenamiento
                  continuo.
                </p>
                <p class="precio">$30.000<span>/mes</span></p>
                <ul class="lista-plan">
                  <li>
                    <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                    Acceso libre a musculación
                  </li>
                  <li>
                    <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                    Pase libre a clases grupales
                  </li>
                  <li>
                    <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                    Plan de entrenamiento personalizado
                  </li>
                  <li>
                    <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                    Evaluación física inicial
                  </li>
                </ul>
                <a href="contacto.php" class="btn btn-zona w-100"
                  >Elegir plan
                  <span class="visually-hidden">Trimestral</span></a
                >
              </article>
            </div>
            <div class="col-md-4">
              <article class="plan h-100">
                <h3>Anual</h3>
                <p class="plan-desc">
                  Máximo compromiso, máxima recompensa. El mejor valor por tu
                  dinero.
                </p>
                <p class="precio">$25.000<span>/mes</span></p>
                <ul class="lista-plan">
                  <li>
                    <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                    Acceso libre a musculación
                  </li>
                  <li>
                    <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                    Pase libre a clases grupales
                  </li>
                  <li>
                    <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                    Plan de entrenamiento personalizado
                  </li>
                </ul>
                <a href="contacto.php" class="btn btn-outline-light w-100"
                  >Elegir plan <span class="visually-hidden">Anual</span></a
                >
              </article>
            </div>
          </div>
        </div>
      </section>

      <!-- 7. HORARIOS -->
      <section id="horarios" class="seccion seccion-oscura">
        <div class="container">
          <div class="text-center mb-5">
            <p class="etiqueta">Horarios</p>
            <h2>Horarios del gimnasio</h2>
            <p class="subtitulo">
              Estamos abiertos casi todo el día para que entrenes cuando mejor
              te quede.
            </p>
          </div>
          <div class="row g-4 justify-content-center">
            <div class="col-lg-5">
              <div class="table-responsive">
                <table
                  class="table table-dark tabla-horarios align-middle text-center mb-0"
                >
                  <caption>
                    Los domingos el gimnasio permanece cerrado.
                  </caption>
                  <thead>
                    <tr>
                      <th scope="col" class="text-start">Días</th>
                      <th scope="col">Horario</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row" class="text-start">Lunes a viernes</th>
                      <td>7:30 a 23:00</td>
                    </tr>
                    <tr>
                      <th scope="row" class="text-start">Sábados</th>
                      <td>9:00 a 13:00</td>
                    </tr>
                    <tr>
                      <th scope="row" class="text-start">Domingos</th>
                      <td>Cerrado</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="table-responsive">
                <table
                  class="table table-dark tabla-horarios align-middle text-center mb-0"
                >
                  <caption>
                    Turnos de nuestro equipo de lunes a viernes.
                  </caption>
                  <thead>
                    <tr>
                      <th scope="col" class="text-start">Persona</th>
                      <th scope="col">Rol</th>
                      <th scope="col">Turno</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row" class="text-start">Agustina</th>
                      <td>Instructora</td>
                      <td>7:30 a 13:00</td>
                    </tr>
                    <tr>
                      <th scope="row" class="text-start">Ariel</th>
                      <td>Instructor</td>
                      <td>13:00 a 17:00</td>
                    </tr>
                    <tr>
                      <th scope="row" class="text-start">Daniel</th>
                      <td>Dueño</td>
                      <td>17:00 a 23:00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php require_once 'includes/footer.php'; ?>
