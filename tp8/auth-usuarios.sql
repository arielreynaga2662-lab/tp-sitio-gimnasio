-- =============================================================
-- TP 8 - Manejo de estado, sesiones y autenticación
-- Zonafit Gym - Adaptación de la tabla usuarios para el login
--
-- Ejecutar en phpMyAdmin (pestaña SQL) o desde consola MySQL.
-- Requiere la base zonafit_gym creada con tp6/schema.sql.
-- =============================================================

USE zonafit_gym;

-- 1) La columna rol del TP8 ('admin' / 'usuario') se guarda
--    directo en usuarios para el control de acceso por sesión.
--    rol_id pasa a admitir NULL: los usuarios nuevos que se
--    registran por la web no tienen rol del modelo del TP6.
ALTER TABLE usuarios
  MODIFY rol_id INT NULL,
  ADD COLUMN rol VARCHAR(20) NOT NULL DEFAULT 'usuario' AFTER password;

-- 2) Usuario administrador semilla para probar el panel.
--    Email:    admin@zonafitgym.com
--    Password: admin123   (guardada hasheada con password_hash BCRYPT)
INSERT INTO usuarios (nombre, apellido, email, password, rol) VALUES
('Admin', 'Zonafit', 'admin@zonafitgym.com',
 '$2y$10$e6nMNRJkSfReJUrqxUvT2Or8uPQaIuzyBcGH9yTu1y5vA7vq9TruW', 'admin');

-- 3) Verificación: estructura y usuarios existentes
DESCRIBE usuarios;
SELECT id, nombre, apellido, email, rol FROM usuarios;
