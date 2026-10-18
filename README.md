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

## Clase 5 — Procesamiento de formularios y seguridad web

Todo el desarrollo de esta entrega está en la carpeta `clase5/` (copia completa del sitio PHP). Se probaron dos interacciones de formulario procesadas en el servidor.

### Formulario POST — Contacto (`contacto.php`)

- El formulario envía nombre, email y mensaje por `POST` a la misma página.
- **Sanitización:** los valores se recortan con `trim()` y se imprimen con `htmlspecialchars()`, que convierte caracteres como `<` y `>` en texto inofensivo para evitar XSS.
- **Validación server-side:** campos obligatorios y formato de email con `filter_var($email, FILTER_VALIDATE_EMAIL)`.
- La interfaz muestra mensajes claros: una alerta roja con la lista de errores o una alerta verde de éxito.
- Si hay errores, los campos conservan lo escrito (`value="<?= htmlspecialchars($valores['...']) ?>"`), así el usuario no reescribe todo.
- La validación del navegador se desactivó (`novalidate`) para demostrar que es PHP quien valida.

### Formulario GET — Buscador de disciplinas (`index.php`)

- En la sección "Nuestras especialidades" hay un buscador que viaja por `GET` (el texto queda en la URL: `index.php?buscar=funcional`).
- Las disciplinas están en un array PHP; `array_filter` + `stripos` filtran las que coinciden con la búsqueda, y una función `normalizar()` ignora tildes y mayúsculas.
- La entrada también se sanitiza con `htmlspecialchars()` antes de mostrarse.
- La página muestra cuántos resultados encontró, o "No encontramos disciplinas" si no hubo coincidencias.

### Evidencias

| Captura | Muestra |
| --- | --- |
| `docs/evidencia-tp5/post-errores.png` | Formulario POST enviado vacío: errores de validación generados por PHP |
| `docs/evidencia-tp5/post-exito.png` | Formulario POST correcto: mensaje de éxito del servidor |
| `docs/evidencia-tp5/get-busqueda.png` | Buscador GET con "funcional": 1 resultado, parámetro visible en la URL |
## Clase 6 — Esquema relacional en MySQL

Diseño de la base de datos `zonafit_gym` en la carpeta `tp6/`:

- `schema.sql` — creación de la base y 6 tablas (`roles`, `planes`, `disciplinas`, `usuarios`, `membresias`, `inscripciones`) con PKs autoincrementales, FKs, índices y campos de auditoría.
- `consultas.sql` — datos de prueba y operaciones CRUD (INSERT, SELECT con WHERE/ORDER BY, INNER JOIN, UPDATE, DELETE).
- `NORMALIZACION.md` — documentación del proceso 1FN → 2FN → 3FN.

## Clase 7 — Persistencia PHP-MySQL con PDO y módulo CRUD

El sitio se conecta a la base `zonafit_gym` (diseñada en el TP 6) usando **PDO** con consultas preparadas. El módulo de administración vive en `admin/` y gestiona los **planes de membresía** del gimnasio.

### Archivos

- `config/conexion.php` — instancia PDO con `try-catch` (PDOException), `ERRMODE_EXCEPTION`, `FETCH_ASSOC` y `EMULATE_PREPARES = false` (sentencias preparadas reales). Las credenciales se leen del `.env` (`DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, `DB_PASS`) y el error detallado se registra en el log en vez de mostrarse en pantalla.
- `admin/index.php` — **Read**: listado de planes con acciones Editar/Eliminar y mensajes de estado.
- `admin/crear.php` — **Create**: formulario validado en el servidor + `INSERT` preparado (`:nombre`, `:precio`, `:descripcion`).
- `admin/editar.php` — **Update**: `SELECT` preparado por `:id` + `UPDATE` preparado.
- `admin/eliminar.php` — **Delete**: `DELETE` preparado por `:id`.

### Seguridad

- **Anti inyección SQL:** todas las consultas con datos del usuario usan sentencias preparadas con parámetros nombrados.
- **Anti XSS:** todo valor impreso en el HTML pasa por `htmlspecialchars()`.
- **Validación server-side:** nombre obligatorio y precio numérico mayor o igual a 0; los campos conservan lo escrito si hay error.
- El `id` de editar/eliminar se convierte a entero con `(int)` antes de usarlo.

### Integración

El panel reutiliza la maquetación del sitio (`includes/header.php`, `nav.php`, `footer.php` y `css/styles.css`). Los includes ahora usan la variable `$base_ruta` para prefijar las rutas (`''` en la raíz, `'../'` dentro de `admin/`), así el menú y los estilos funcionan desde cualquier carpeta. El menú incorporó el ítem **Admin**.

### Cómo probar

1. Levantar Apache y MySQL en XAMPP y verificar que exista la base `zonafit_gym` (scripts de `tp6/`).
2. Completar las variables `DB_*` en `.env` (en XAMPP: usuario `root`, contraseña vacía).
3. Entrar a `http://localhost/tp-sitio-gimnasio/admin/` — crear, editar y eliminar planes; los cambios se reflejan al instante en la tabla.
