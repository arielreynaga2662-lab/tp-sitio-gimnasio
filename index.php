<?php
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
                <a class="btn btn-zona btn-lg" href="#planes"
                  >Quiero inscribirme</a
                >
                <a class="btn btn-outline-light btn-lg" href="#horarios"
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
                <a href="#contacto" class="btn btn-outline-light w-100"
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
                <a href="#contacto" class="btn btn-zona w-100"
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
                <a href="#contacto" class="btn btn-outline-light w-100"
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

      <!-- 8. ENTRENADORES / EQUIPO -->
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

      <!-- 9. CONTACTO -->
      <section id="contacto" class="seccion seccion-oscura">
        <div class="container">
          <div class="text-center mb-5">
            <p class="etiqueta">Contacto</p>
            <h2>Unite a la comunidad</h2>
            <p class="subtitulo">
              ¿Tenés dudas o querés conocer la sede? Mandanos un mensaje y te
              contactamos.
            </p>
          </div>
          <div class="row g-4 g-lg-5">
            <div class="col-lg-5">
              <h3>Estemos en contacto</h3>
              <p>
                Vení a visitarnos de lunes a sábados y pedí tu clase de prueba
                gratis.
              </p>
              <address>
                <ul class="list-unstyled datos-contacto">
                  <li>
                    <i class="bi bi-envelope-fill" aria-hidden="true"></i>
                    <a href="mailto:contacto@zonafitgym.com"
                      >contacto@zonafitgym.com</a
                    >
                  </li>
                  <li>
                    <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                    <a href="tel:+543872229113">+54 387 2229113</a>
                  </li>
                  <li>
                    <i class="bi bi-geo-alt-fill" aria-hidden="true"></i> Ayacucho 720, Salta, Argentina
                  </li>
                </ul>
              </address>
              <p class="etiqueta-redes">Redes sociales</p>
              <div class="d-flex gap-3">
                <a
                  class="red-social"
                  href="https://www.instagram.com/"
                  target="_blank"
                  rel="noopener"
                  aria-label="Instagram de Zonafit"
                  ><i class="bi bi-instagram" aria-hidden="true"></i
                ></a>
                <a
                  class="red-social"
                  href="https://www.facebook.com/"
                  target="_blank"
                  rel="noopener"
                  aria-label="Facebook de Zonafit"
                  ><i class="bi bi-facebook" aria-hidden="true"></i
                ></a>
                <a
                  class="red-social"
                  href="https://wa.me/543872229113"
                  target="_blank"
                  rel="noopener"
                  aria-label="WhatsApp de Zonafit"
                  ><i class="bi bi-whatsapp" aria-hidden="true"></i
                ></a>
              </div>
            </div>
            <div class="col-lg-7">
              <form
                id="form-contacto"
                class="formulario needs-validation"
                novalidate
              >
                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nombre"
                    name="nombre"
                    placeholder="Tu nombre"
                    autocomplete="name"
                    required
                  />
                  <div class="invalid-feedback">Ingresá tu nombre.</div>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="tuemail@ejemplo.com"
                    autocomplete="email"
                    required
                  />
                  <div class="invalid-feedback">Ingresá un email válido.</div>
                </div>
                <div class="mb-3">
                  <label for="mensaje" class="form-label">Mensaje</label>
                  <textarea
                    class="form-control"
                    id="mensaje"
                    name="mensaje"
                    rows="4"
                    placeholder="Escribí tu mensaje acá..."
                    required
                  ></textarea>
                  <div class="invalid-feedback">Escribí tu mensaje.</div>
                </div>
                <button type="submit" class="btn btn-zona w-100">
                  Enviar consulta
                </button>
                <p
                  id="mensaje-enviado"
                  class="alerta-ok mt-3 mb-0 d-none"
                  role="status"
                >
                  ¡Gracias! Te vamos a responder a la brevedad.
                </p>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>
    <?php require_once 'includes/footer.php'; ?>