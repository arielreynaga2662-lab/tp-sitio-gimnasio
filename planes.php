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
            <h2>Grilla de horarios</h2>
            <p class="subtitulo">
              Planificá tu semana de la mejor manera con nuestras actividades
              programadas.
            </p>
          </div>
          <div class="table-responsive">
            <table
              class="table table-dark tabla-horarios align-middle text-center mb-0"
            >
              <caption>
                Horarios de clases de lunes a viernes. El gimnasio abre de 7:00
                a 23:00.
              </caption>
              <thead>
                <tr>
                  <th scope="col" class="text-start">Clase</th>
                  <th scope="col">Lun</th>
                  <th scope="col">Mar</th>
                  <th scope="col">Mié</th>
                  <th scope="col">Jue</th>
                  <th scope="col">Vie</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="text-start">Funcional</th>
                  <td>08:00</td>
                  <td>—</td>
                  <td>08:00</td>
                  <td>—</td>
                  <td>08:00</td>
                </tr>
                <tr>
                  <th scope="row" class="text-start">Musculación</th>
                  <td>18:00</td>
                  <td>18:00</td>
                  <td>18:00</td>
                  <td>18:00</td>
                  <td>18:00</td>
                </tr>
                <tr>
                  <th scope="row" class="text-start">Grupales</th>
                  <td>—</td>
                  <td>19:00</td>
                  <td>—</td>
                  <td>19:00</td>
                  <td>—</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </main>

<?php require_once 'includes/footer.php'; ?>
