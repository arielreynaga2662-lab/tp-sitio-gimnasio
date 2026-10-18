<?php
$titulo_pagina = "Inicio";
$pagina_actual = "inicio";

// Búsqueda de disciplinas enviada por GET
$disciplinas = [
    [
        'nombre' => 'Musculación',
        'imagen' => 'img/musculacion.jpg',
        'alt' => 'Mano tomando una barra con discos',
        'descripcion' => 'Entrenamiento con pesas y máquinas de última generación orientado a objetivos individuales de fuerza e hipertrofia.',
    ],
    [
        'nombre' => 'Entrenamiento funcional',
        'imagen' => 'img/funcional.jpg',
        'alt' => 'Persona entrenando con sogas de batalla',
        'descripcion' => 'Circuitos dinámicos diseñados para mejorar tu agilidad, resistencia, movilidad y fuerza aplicada a la vida diaria.',
    ],
    [
        'nombre' => 'Clases grupales',
        'imagen' => 'img/grupales.jpg',
        'alt' => 'Grupo de mujeres haciendo ejercicios sobre colchonetas',
        'descripcion' => 'Divertite y motivate entrenando en grupo con instructores capacitados en ritmos, spinning y gimnasia localizada.',
    ],
];

// Saca las tildes y pasa todo a minúsculas para comparar
function normalizar($texto)
{
    $con_tilde = ['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ü', 'Ü'];
    $sin_tilde = ['a', 'e', 'i', 'o', 'u', 'a', 'e', 'i', 'o', 'u', 'u', 'u'];
    return strtolower(str_replace($con_tilde, $sin_tilde, $texto));
}

$busqueda = trim($_GET['buscar'] ?? '');
$busqueda_activa = $busqueda !== '';
$resultados = $disciplinas;

if ($busqueda_activa) {
    $resultados = array_filter($disciplinas, function ($disciplina) use ($busqueda) {
        $texto = $disciplina['nombre'] . ' ' . $disciplina['descripcion'];
        return stripos(normalizar($texto), normalizar($busqueda)) !== false;
    });
}

require_once 'includes/header.php';
require_once 'includes/nav.php';
?>

    <main id="contenido">
      <!-- 2. INICIO (HERO) -->
      <section id="inicio" class="hero">
        <div class="container">
          <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6 order-lg-2">
              <p class="etiqueta">El cambio empieza hoy</p>
              <h1>
                Transformá tu cuerpo,
                <span class="texto-rojo">mejorá tu vida.</span>
              </h1>
              <p class="lead">
                Vení, entrená con nosotros y alcanzá tus objetivos. Contamos con
                equipamiento de primer nivel, instructores expertos y la
                comunidad que necesitás para motivarte.
              </p>
              <div class="d-flex flex-wrap gap-3">
                <a class="btn btn-zona btn-lg" href="planes.php"
                  >Quiero inscribirme</a
                >
                <a class="btn btn-outline-light btn-lg" href="planes.php#horarios"
                  >Ver horarios</a
                >
              </div>
            </div>
            <div class="col-lg-6 order-lg-1">
              <img
                class="img-fluid rounded-4 hero-img"
                src="img/hero.jpg"
                alt="Hombre entrenando bíceps con una barra en el gimnasio"
                width="1200"
                height="800"
                fetchpriority="high"
              />
            </div>
          </div>
        </div>
      </section>

      <!-- 3. DISCIPLINAS -->
      <section id="disciplinas" class="seccion seccion-oscura">
        <div class="container">
          <div class="text-center mb-5">
            <p class="etiqueta">Disciplinas</p>
            <h2>Nuestras especialidades</h2>
            <p class="subtitulo">
              Elegí el camino que mejor se adapte a tu objetivo de
              acondicionamiento físico.
            </p>
          </div>

          <!-- Buscador por GET -->
          <form
            class="row justify-content-center mb-4"
            method="GET"
            action="index.php#disciplinas"
          >
            <div class="col-md-6 d-flex gap-2">
              <input
                type="search"
                name="buscar"
                class="form-control"
                placeholder="Buscá una disciplina (ej: funcional)"
                value="<?= htmlspecialchars($busqueda) ?>"
                aria-label="Buscar disciplina"
              />
              <button class="btn btn-zona" type="submit">Buscar</button>
            </div>
          </form>

          <?php if ($busqueda_activa): ?>
            <p class="text-center subtitulo">
              <?= count($resultados) ?> resultado(s) para
              "<?= htmlspecialchars($busqueda) ?>".
              <a href="index.php#disciplinas" class="link-rojo">Ver todas</a>
            </p>
          <?php endif; ?>

          <div class="row g-4">
            <?php if (empty($resultados)): ?>
              <p class="text-center subtitulo">
                No encontramos disciplinas para esa búsqueda.
              </p>
            <?php else: ?>
              <?php foreach ($resultados as $disciplina): ?>
                <div class="col-md-4">
                  <article class="card tarjeta h-100">
                    <img
                      src="<?= htmlspecialchars($disciplina['imagen']) ?>"
                      class="card-img-top"
                      alt="<?= htmlspecialchars($disciplina['alt']) ?>"
                      width="800"
                      height="533"
                      loading="lazy"
                    />
                    <div class="card-body">
                      <h3 class="card-title">
                        <?= htmlspecialchars($disciplina['nombre']) ?>
                      </h3>
                      <p class="card-text">
                        <?= htmlspecialchars($disciplina['descripcion']) ?>
                      </p>
                      <a href="planes.php#horarios" class="link-rojo"
                        >Ver más
                        <span class="visually-hidden"
                          >sobre
                          <?= htmlspecialchars($disciplina['nombre']) ?></span
                        >
                        <i class="bi bi-arrow-right" aria-hidden="true"></i
                      ></a>
                    </div>
                  </article>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <p class="text-center mt-5 mb-0">
            <a href="equipo.php" class="link-sobre-nosotros"
              >Más sobre nosotros...</a
            >
          </p>
        </div>
      </section>

      <!-- 4. GALERÍA -->
      <section id="galeria" class="seccion">
        <div class="container">
          <div class="text-center mb-5">
            <p class="etiqueta">Instalaciones</p>
            <h2>Zonafit en acción</h2>
            <p class="subtitulo">
              Un vistazo rápido a nuestro templo de entrenamiento y al
              equipamiento que te espera.
            </p>
          </div>
          <div class="row g-3">
            <div class="col-6 col-lg-3">
              <img
                class="img-fluid rounded-3 galeria-img"
                src="img/galeria-1.jpg"
                alt="Hilera de mancuernas en el gimnasio"
                width="800"
                height="600"
                loading="lazy"
              />
            </div>
            <div class="col-6 col-lg-3">
              <img
                class="img-fluid rounded-3 galeria-img"
                src="img/galeria-2.jpg"
                alt="Mujer haciendo sentadillas con barra"
                width="800"
                height="600"
                loading="lazy"
              />
            </div>
            <div class="col-6 col-lg-3">
              <img
                class="img-fluid rounded-3 galeria-img"
                src="img/galeria-3.jpg"
                alt="Sala de cardio con cintas de correr"
                width="800"
                height="600"
                loading="lazy"
              />
            </div>
            <div class="col-6 col-lg-3">
              <img
                class="img-fluid rounded-3 galeria-img"
                src="img/galeria-4.jpg"
                alt="Hombre levantando una barra en un ambiente oscuro"
                width="800"
                height="600"
                loading="lazy"
              />
            </div>
          </div>
        </div>
      </section>

      <!-- 5. COMENTARIOS -->
      <section id="comentarios" class="seccion seccion-oscura">
        <div class="container">
          <div class="text-center mb-5">
            <p class="etiqueta">Opiniones</p>
            <h2>Comentarios de nuestros socios</h2>
            <p class="subtitulo">
              La experiencia real de quienes ya entrenan en Zonafit.
            </p>
          </div>
          <div class="row g-4">
            <div class="col-md-4">
              <figure class="comentario h-100">
                <figcaption class="d-flex align-items-center gap-3 mb-3">
                  <span class="avatar" aria-hidden="true">MG</span>
                  <span
                    ><strong>María García</strong><br /><small
                      >Socia hace 2 años</small
                    ></span
                  >
                </figcaption>
                <blockquote class="mb-3">
                  <p>
                    "Excelente el ambiente del gimnasio y los entrenadores están
                    siempre atentos a corregir la postura."
                  </p>
                </blockquote>
                <p class="estrellas mb-0" aria-label="5 de 5 estrellas">
                  ★★★★★
                </p>
              </figure>
            </div>
            <div class="col-md-4">
              <figure class="comentario h-100">
                <figcaption class="d-flex align-items-center gap-3 mb-3">
                  <span class="avatar" aria-hidden="true">JP</span>
                  <span
                    ><strong>Juan Pérez</strong><br /><small
                      >Plan trimestral</small
                    ></span
                  >
                </figcaption>
                <blockquote class="mb-3">
                  <p>
                    "Los planes trimestrales tienen muy buena relación
                    precio-calidad. Las instalaciones, impecables."
                  </p>
                </blockquote>
                <p class="estrellas mb-0" aria-label="4 de 5 estrellas">
                  ★★★★☆
                </p>
              </figure>
            </div>
            <div class="col-md-4">
              <figure class="comentario h-100">
                <figcaption class="d-flex align-items-center gap-3 mb-3">
                  <span class="avatar" aria-hidden="true">LL</span>
                  <span
                    ><strong>Laura López</strong><br /><small
                      >Clases de funcional</small
                    ></span
                  >
                </figcaption>
                <blockquote class="mb-3">
                  <p>
                    "La clase de funcional es espectacular, dinámica y cambia
                    todos los días para no aburrirse."
                  </p>
                </blockquote>
                <p class="estrellas mb-0" aria-label="5 de 5 estrellas">
                  ★★★★★
                </p>
              </figure>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php require_once 'includes/footer.php'; ?>
