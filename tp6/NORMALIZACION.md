# TP 6 — Normalización del esquema (Zonafit Gym)

Este documento muestra el proceso de normalización aplicado al diseño
de la base de datos del gimnasio: se parte de una tabla "desordenada"
(campos multivalorados y datos redundantes) y se llega al esquema final
aplicando 1FN, 2FN y 3FN.

Los scripts `schema.sql` (DDL) y `consultas.sql` (DML) de esta misma
carpeta implementan el resultado final.

---

## Tabla inicial sin normalizar

Imaginemos que llevamos el registro de socios en una planilla donde
cada fila tiene **todo junto**: los datos personales, el rol, el plan
contratado y las disciplinas en las que se anotó.

| id_socio | nombre_socio | contacto | rol | membresia | disciplinas |
|---|---|---|---|---|---|
| 1 | Ariel Reynaga | ariel@example.com - tels: 11-5555-0002 / 11-5555-0999 | socio | Plan Full, $45.000/mes, del 01/10/2026 al 01/11/2026 | Musculación, Funcional |
| 2 | María González | maria@example.com - tel: 11-5555-0003 | socio | Plan Base, $25.000/mes, del 15/09/2026 al 15/10/2026 | Musculación |

**Problemas de esta tabla:**

- **Campos multivalorados:** `contacto` mezcla email y dos teléfonos;
  `disciplinas` guarda una lista dentro de una sola celda.
- **Datos agrupados:** `membresia` contiene nombre del plan, precio,
  fecha de inicio y fecha de fin en un solo campo.
- **Redundancia:** si dos socios tienen Plan Full, el nombre y el
  precio del plan se repiten en cada fila; si el precio cambia, hay que
  actualizar muchas filas y pueden quedar inconsistencias.
- **Dependencias transitivas:** el precio depende del plan, no del
  socio.

---

## Primera Forma Normal (1FN)

**Regla:** todos los campos deben ser atómicos (un solo valor por celda)
y no puede haber grupos repetitivos.

Acciones:

1. Separar `contacto` en `email` y `telefono` (cada socio queda con un
   solo teléfono de contacto).
2. Separar `membresia` en `plan`, `precio_plan`, `fecha_inicio`,
   `fecha_fin`.
3. Eliminar la lista de disciplinas: cada combinación socio-disciplina
   pasa a ser una fila aparte.

Resultado:

| id_socio | nombre | apellido | email | telefono | rol | plan | precio_plan | fecha_inicio | fecha_fin | disciplina |
|---|---|---|---|---|---|---|---|---|---|---|
| 1 | Ariel | Reynaga | ariel@example.com | 11-5555-0002 | socio | Plan Full | 45000 | 01/10/2026 | 01/11/2026 | Musculación |
| 1 | Ariel | Reynaga | ariel@example.com | 11-5555-0002 | socio | Plan Full | 45000 | 01/10/2026 | 01/11/2026 | Funcional |
| 2 | María | González | maria@example.com | 11-5555-0003 | socio | Plan Base | 25000 | 15/09/2026 | 15/10/2026 | Musculación |

Los valores ya son atómicos, pero la tabla repite todos los datos del
socio y del plan en cada fila: sigue habiendo redundancia.

---

## Segunda Forma Normal (2FN)

**Regla:** estar en 1FN y que ningún campo dependa de **parte** de la
clave primaria (eliminar dependencias parciales).

La tabla anterior tendría una clave compuesta `(id_socio, disciplina)`,
pero campos como `nombre`, `email`, `rol`, `plan`, `fecha_inicio` y
`fecha_fin` dependen **solo de `id_socio`**, no de la combinación
socio + disciplina. Es decir, la membresía del socio no tiene nada que
ver con la disciplina en la que se anotó.

Acciones:

1. Separar los datos del **usuario** en su propia tabla (`usuarios`).
2. Separar la **membresía** (socio + plan + fechas) en `membresias`.
3. Dejar en `inscripciones` únicamente el par `usuario_id +
   disciplina_id`, que sí depende de la clave compuesta completa.

Resultado:

- `usuarios` (id, nombre, apellido, email, telefono, rol, plan,
  fecha_inicio, fecha_fin) — todavía mezcla rol y plan, se resuelve en
  3FN.
- `inscripciones` (usuario_id, disciplina_id, fecha_inscripcion).

---

## Tercera Forma Normal (3FN)

**Regla:** estar en 2FN y que ningún campo dependa de **otro campo que
no sea la clave** (eliminar dependencias transitivas).

En la tabla `usuarios` quedan dos dependencias transitivas:

- `rol` → la descripción del rol depende del nombre del rol, no del
  usuario → se extrae la tabla `roles`.
- `plan`, `precio_plan` → el precio depende del plan, no del socio ni de
  su membresía → se extrae la tabla `planes` y `membresias` guarda solo
  la referencia `plan_id` más las fechas y el estado propios de esa
  membresía.
- `disciplina` (nombre de la disciplina) → se extrae `disciplinas`, y
  `inscripciones` pasa a guardar `disciplina_id`.

Resultado final: cada dato está en un solo lugar. Cambiar el precio del
Plan Full actualiza una sola fila de `planes` y se refleja en todas las
membresías que lo referencian.

---

## Tablas resultantes

| Tabla | Tipo | Clave primaria | Claves foráneas |
|---|---|---|---|
| `roles` | maestra | `id` | — |
| `planes` | maestra | `id` | — |
| `disciplinas` | maestra | `id` | — |
| `usuarios` | usuarios | `id` | `rol_id` → `roles.id` |
| `membresias` | principal de negocio | `id` | `usuario_id` → `usuarios.id`, `plan_id` → `planes.id` |
| `inscripciones` | relación N:M | `(usuario_id, disciplina_id)` | `usuario_id` → `usuarios.id`, `disciplina_id` → `disciplinas.id` |

## Relaciones

- `roles` 1 → N `usuarios`: un rol lo tienen muchos usuarios.
- `usuarios` 1 → N `membresias`: un socio puede tener varias membresías
  a lo largo del tiempo.
- `planes` 1 → N `membresias`: un plan lo contratan muchos socios.
- `usuarios` N ↔ M `disciplinas` a través de `inscripciones`.
