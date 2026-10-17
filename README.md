# Sitio Web - Zonafit Gym

Trabajo Práctico anual de Diseño Web — Tecnicatura Superior en Análisis, Diseño y Desarrollo de Software
IES N° 6.001 "Gral. Manuel Belgrano"

**Repositorio:** https://github.com/arielreynaga2662-lab/tp-sitio-gimnasio

## Descripción del proyecto

Sitio web informativo para el gimnasio **Zonafit Gym**, con información sobre disciplinas, galería, opiniones de socios, planes de membresía, horarios, entrenadores y un formulario de contacto.

En el TP 4 el sitio se migró de HTML estático a **PHP**, dividiéndolo en varias páginas con componentes reutilizables y renderizado del lado del servidor.

## ¿Qué son PHP, SSI y SSR?

- **PHP**: lenguaje que se ejecuta **en el servidor**. Apache procesa el código PHP, genera el HTML final y recién ahí se lo envía al navegador.
- **SSI (Server-Side Includes)**: las partes que se repiten en todas las páginas (cabecera, menú y pie) viven en archivos aparte dentro de `includes/` y se incorporan con `require_once`. Si cambia el menú, se modifica en un solo lugar.
- **SSR (Server-Side Rendering)**: el HTML se "renderiza" en el servidor. Cada página define variables como `$titulo_pagina` y `$pagina_actual`, y el servidor las usa para generar un `<title>` distinto y marcar el ítem activo del menú antes de enviar la página.

## Páginas

- `index.php` — Inicio, disciplinas, galería y comentarios
- `planes.php` — Planes y precios + horarios
- `equipo.php` — Entrenadores / equipo
- `contacto.php` — Contacto con formulario validado

## Configuración por variables de entorno

Los datos de configuración no van en el código: se leen desde un archivo `.env` (nombre del sitio, email de contacto y entorno). El archivo real **no se sube al repositorio** (está en `.gitignore`); se incluye `.env.example` como plantilla:

```
APP_NAME=Zonafit Gym
CONTACT_EMAIL=contacto@zonafitgym.com
APP_ENV=local
```

`config/env.php` carga esas variables en `$_ENV` y `includes/header.php` las usa en cada página.

## Tecnologías

- PHP 8.2 sobre Apache (XAMPP)
- HTML5 semántico
- CSS3 (estilos propios en `css/styles.css`)
- JavaScript (`js/main.js`)
- Bootstrap 5.3.3 y Bootstrap Icons (por CDN)
- Git y GitHub (rama `feature/migracion-php-ssi`, Pull Request)

## Estructura del repositorio

```text
├── index.php                # Página de inicio
├── planes.php               # Planes y horarios
├── equipo.php               # Entrenadores
├── contacto.php             # Contacto
├── includes/
│   ├── header.php           # Cabecera HTML + carga de .env + título dinámico
│   ├── nav.php              # Menú con ítem activo según la página
│   └── footer.php           # Pie de página + scripts
├── config/
│   └── env.php              # Carga las variables del .env en $_ENV
├── .env                     # Configuración local (no se sube a GitHub)
├── .env.example             # Plantilla de configuración
├── .gitignore               # Ignora .env
├── css/                     # Estilos propios
├── js/                      # Menú móvil, año del footer y validación
├── img/                     # Imágenes y favicon
├── docs/                    # Documentación, wireframes y auditoría Lighthouse
├── figma/                   # Capturas del wireframe en Figma
├── mockup-uiux/             # Mockup final UI/UX
└── README.md
```

## Cómo ejecutarlo en local

1. Instalar **XAMPP** (https://www.apachefriends.org) con PHP 8.x.
2. Copiar este proyecto dentro de `C:\xampp\htdocs\` (ej.: `C:\xampp\htdocs\tp-sitio-gimnasio`).
3. Crear el archivo `.env` en la raíz copiando `.env.example` y completando los valores reales.
4. Abrir **XAMPP Control Panel** y pulsar **Start** en **Apache**.
5. En el navegador, entrar a `http://localhost/tp-sitio-gimnasio/`.

> Nota: Live Server no ejecuta PHP; el sitio debe probarse con Apache en `localhost`. GitHub Pages tampoco ejecuta PHP, por eso la entrega del TP 4 es este repositorio.

## Diseño

- **Figma / wireframe:** PEGAR-LINK-DE-FIGMA-ACÁ
- Mockup final en `mockup-uiux/`

## Evidencia

(agregar capturas del sitio funcionando en localhost: cada página con su título y el menú activo)

## Autor

Ariel Reynaga
