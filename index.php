<?php
$titulo_pagina = "Inicio";
$pagina_actual = "inicio";
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
                <a class="btn btn-zona btn-lg" href="registro.php"
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
          <div class="row g-4">
            <div class="col-md-4">
              <article class="card tarjeta h-100">
                <img
                  src="img/musculacion.jpg"
                  class="card-img-top"
                  alt="Mano tomando una barra con discos"
                  width="800"
                  height="533"
                  loading="lazy"
                />
                <div class="card-body">
                  <h3 class="card-title">Musculación</h3>
                  <p class="card-text">
                    Entrenamiento con pesas y máquinas de última generación
                    orientado a objetivos individuales de fuerza e hipertrofia.
                  </p>
                  <a href="#horarios" class="link-rojo"
                    >Ver más
                    <span class="visually-hidden">sobre Musculación</span>
                    <i class="bi bi-arrow-right" aria-hidden="true"></i
                  ></a>
                </div>
              </article>
            </div>
            <div class="col-md-4">
              <article class="card tarjeta h-100">
                <img
                  src="img/funcional.jpg"
                  class="card-img-top"
                  alt="Persona entrenando con sogas de batalla"
                  width="800"
                  height="533"
                  loading="lazy"
                />
                <div class="card-body">
                  <h3 class="card-title">Entrenamiento funcional</h3>
                  <p class="card-text">
                    Circuitos dinámicos diseñados para mejorar tu agilidad,
                    resistencia, movilidad y fuerza aplicada a la vida diaria.
                  </p>
                  <a href="#horarios" class="link-rojo"
                    >Ver más
                    <span class="visually-hidden"
                      >sobre Entrenamiento funcional</span
                    >
                    <i class="bi bi-arrow-right" aria-hidden="true"></i
                  ></a>
                </div>
              </article>
            </div>
            <div class="col-md-4">
              <article class="card tarjeta h-100">
                <img
                  src="img/grupales.jpg"
                  class="card-img-top"
                  alt="Grupo de mujeres haciendo ejercicios sobre colchonetas"
                  width="800"
                  height="533"
                  loading="lazy"
                />
                <div class="card-body">
                  <h3 class="card-title">Clases grupales</h3>
                  <p class="card-text">
                    Divertite y motivate entrenando en grupo con instructores
                    capacitados en ritmos, spinning y gimnasia localizada.
                  </p>
                  <a href="#horarios" class="link-rojo"
                    >Ver más
                    <span class="visually-hidden">sobre Clases grupales</span>
                    <i class="bi bi-arrow-right" aria-hidden="true"></i
                  ></a>
                </div>
              </article>
            </div>
          </div>
          <p class="text-center mt-5 mb-0">
            <a href="#equipo" class="link-sobre-nosotros"
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
                <p class="estrellas mb-0" aria-label="5 de 5 estrellas">
                  ★★★★★
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
                <p class="estrellas mb-0" aria-label="4 de 5 estrellas">
                  ★★★★☆
                </p>
              </figure>
            </div>
          </div>
        </div>
      </section>
    </main>
    
    <?php require_once 'includes/footer.php'; ?>