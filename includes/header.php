<?php
require_once __DIR__ . '/../config/env.php';
require_once __DIR__ . '/sesion.php';
// Prefijo para las rutas de los recursos: '' en la raíz, '../' dentro de admin/
$base_ruta = $base_ruta ?? '';
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?= $titulo_pagina ?> | <?= $_ENV['APP_NAME'] ?></title>
    <meta
      name="description"
      content="Extreme Gym: entrená musculación, funcional y clases grupales con profesores capacitados. Conocé nuestros planes, horarios y equipo."
    />
    <meta name="author" content="Ariel Reynaga" />
    <link
      rel="canonical"
      href="https://arielreynaga2662-lab.github.io/tp-sitio-gimnasio/"
    />
    <meta property="og:title" content="Extreme Gym" />
    <meta
      property="og:description"
      content="Transformá tu cuerpo, mejorá tu vida. Planes, horarios y clases."
    />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?= $base_ruta ?>img/hero.jpg" />
    <link rel="icon" href="<?= $base_ruta ?>img/favicon.svg" type="image/svg+xml" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <link rel="stylesheet" href="<?= $base_ruta ?>css/styles.css" />
  </head>

  <body>
    <a class="skip-link" href="#contenido">Saltar al contenido</a>