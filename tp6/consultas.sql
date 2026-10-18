-- ============================================================
-- TP6 - Zonafit Gym
-- consultas.sql - Datos de prueba y operaciones CRUD
-- Ejecutar DESPUES de schema.sql
-- ============================================================

USE zonafit_gym;

-- ----------------------------------------------------------
-- 1) INSERTS en tablas maestras (roles, planes, disciplinas)
-- ----------------------------------------------------------
INSERT INTO roles (nombre, descripcion) VALUES
('admin',     'Administrador del sistema'),
('socio',     'Socio del gimnasio'),
('recepcion', 'Personal de recepcion');

INSERT INTO planes (nombre, precio_mensual, descripcion) VALUES
('Plan Base',   25000.00, 'Acceso a sala de musculacion'),
('Plan Full',   45000.00, 'Musculacion y todas las clases grupales'),
('Plan Clases', 35000.00, 'Solo clases grupales');

INSERT INTO disciplinas (nombre, descripcion) VALUES
('Musculacion',             'Entrenamiento con pesas y maquinas'),
('Entrenamiento funcional', 'Circuitos dinamicos de fuerza y movilidad'),
('Clases grupales',         'Spinning, localizada y ritmos');

-- ----------------------------------------------------------
-- 2) INSERTS en usuarios
-- (el password va como hash: en el TP7 se genera con
--  password_hash() de PHP)
-- ----------------------------------------------------------
INSERT INTO usuarios
  (rol_id, nombre, apellido, email, password, telefono)
VALUES
(1, 'Ana',   'Admin',    'admin@zonafit.com', '$2y$10$hashEjemploAdmin',  '11-5555-0001'),
(2, 'Ariel', 'Reynaga',  'ariel@example.com', '$2y$10$hashEjemploSocio1', '11-5555-0002'),
(2, 'Maria', 'Gonzalez', 'maria@example.com', '$2y$10$hashEjemploSocio2', '11-5555-0003'),
(2, 'Juan',  'Perez',    'juan@example.com',  '$2y$10$hashEjemploSocio3', NULL);

-- ----------------------------------------------------------
-- 3) INSERTS en la tabla principal (membresias, con FKs)
-- ----------------------------------------------------------
INSERT INTO membresias
  (usuario_id, plan_id, fecha_inicio, fecha_fin, estado)
VALUES
(2, 2, '2026-10-01', '2026-11-01', 'activa'),
(3, 1, '2026-09-15', '2026-10-15', 'activa'),
(4, 3, '2026-08-01', '2026-09-01', 'vencida');

-- ----------------------------------------------------------
-- 4) INSERTS en la tabla de relacion N:M
-- ----------------------------------------------------------
INSERT INTO inscripciones
  (usuario_id, disciplina_id, fecha_inscripcion)
VALUES
(2, 1, '2026-10-01'),
(2, 2, '2026-10-01'),
(3, 1, '2026-09-15'),
(4, 3, '2026-08-01');

-- ----------------------------------------------------------
-- 5) SELECT con WHERE y ORDER BY
-- Todos los socios (rol_id = 2) ordenados por apellido
-- ----------------------------------------------------------
SELECT id, nombre, apellido, email
FROM usuarios
WHERE rol_id = 2
ORDER BY apellido ASC;

-- ----------------------------------------------------------
-- 6) SELECT con INNER JOIN
-- Socios con su plan y estado de membresia
-- ----------------------------------------------------------
SELECT u.nombre, u.apellido, p.nombre AS plan,
       m.fecha_inicio, m.fecha_fin, m.estado
FROM membresias m
INNER JOIN usuarios u ON m.usuario_id = u.id
INNER JOIN planes   p ON m.plan_id    = p.id
ORDER BY m.fecha_inicio DESC;

-- ----------------------------------------------------------
-- 7) UPDATE con WHERE
-- Marca como vencidas las membresias cuya fecha_fin ya paso
-- ----------------------------------------------------------
UPDATE membresias
SET estado = 'vencida'
WHERE estado = 'activa'
  AND fecha_fin < CURDATE();

-- ----------------------------------------------------------
-- 8) DELETE con WHERE
-- Juan (id 4) se da de baja de Clases grupales (id 3)
-- ----------------------------------------------------------
DELETE FROM inscripciones
WHERE usuario_id = 4
  AND disciplina_id = 3;
