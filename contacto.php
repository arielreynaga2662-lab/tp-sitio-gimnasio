<?php
$titulo_pagina = "Contacto";
$pagina_actual = "contacto";
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>

    <main id="contenido">
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
                    <a href="mailto:<?= $_ENV['CONTACT_EMAIL'] ?>"
                      ><?= $_ENV['CONTACT_EMAIL'] ?></a
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