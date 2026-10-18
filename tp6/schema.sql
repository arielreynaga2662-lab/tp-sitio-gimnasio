-- ============================================================
-- TP6 - Zonafit Gym
-- schema.sql - Esquema relacional de la base de datos
-- Motor: MariaDB/MySQL (XAMPP) - charset utf8mb4
-- ============================================================

-- Crear la base de datos y usarla
CREATE DATABASE IF NOT EXISTS zonafit_gym
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE zonafit_gym;

-- ----------------------------------------------------------
-- Tabla maestra: roles (admin, socio, recepcion)
-- ----------------------------------------------------------
CREATE TABLE roles (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  nombre      VARCHAR(50) NOT NULL UNIQUE,
  descripcion VARCHAR(150) DEFAULT NULL
);

-- ----------------------------------------------------------
-- Tabla maestra: planes de membresia que vende el gym
-- ----------------------------------------------------------
CREATE TABLE planes (
  id             INT AUTO_INCREMENT PRIMARY KEY,
  nombre         VARCHAR(80) NOT NULL UNIQUE,
  precio_mensual DECIMAL(10,2) NOT NULL,
  descripcion    VARCHAR(200) DEFAULT NULL
);

-- ----------------------------------------------------------
-- Tabla maestra: disciplinas / clases que se dictan
-- ----------------------------------------------------------
CREATE TABLE disciplinas (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  nombre      VARCHAR(80) NOT NULL UNIQUE,
  descripcion VARCHAR(200) DEFAULT NULL
);

-- ----------------------------------------------------------
-- Tabla de usuarios: socios y personal del gimnasio
-- (email, password, rol y datos personales)
-- ----------------------------------------------------------
CREATE TABLE usuarios (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  rol_id     INT NOT NULL,
  nombre     VARCHAR(80)  NOT NULL,
  apellido   VARCHAR(80)  NOT NULL,
  email      VARCHAR(120) NOT NULL,
  password   VARCHAR(255) NOT NULL,
  telefono   VARCHAR(30)  DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_usuarios_rol
    FOREIGN KEY (rol_id) REFERENCES roles (id)
);

-- ----------------------------------------------------------
-- Tabla principal de negocio: membresias
-- Relaciona cada usuario con el plan que contrato
-- ----------------------------------------------------------
CREATE TABLE membresias (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id   INT NOT NULL,
  plan_id      INT NOT NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin    DATE NOT NULL,
  estado       ENUM('activa', 'vencida', 'cancelada')
               NOT NULL DEFAULT 'activa',
  created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
               ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_membresias_usuario
    FOREIGN KEY (usuario_id) REFERENCES usuarios (id),
  CONSTRAINT fk_membresias_plan
    FOREIGN KEY (plan_id)    REFERENCES planes (id)
);

-- ----------------------------------------------------------
-- Tabla de relacion N:M: inscripciones
-- Un socio puede anotarse en muchas disciplinas y cada
-- disciplina tiene muchos socios anotados.
-- ----------------------------------------------------------
CREATE TABLE inscripciones (
  usuario_id        INT NOT NULL,
  disciplina_id     INT NOT NULL,
  fecha_inscripcion DATE NOT NULL,
  created_at        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (usuario_id, disciplina_id),
  CONSTRAINT fk_inscripciones_usuario
    FOREIGN KEY (usuario_id)    REFERENCES usuarios (id),
  CONSTRAINT fk_inscripciones_disciplina
    FOREIGN KEY (disciplina_id) REFERENCES disciplinas (id)
);

-- ----------------------------------------------------------
-- Indices: aceleran busquedas frecuentes
-- ----------------------------------------------------------
CREATE UNIQUE INDEX idx_usuarios_email ON usuarios (email);
CREATE INDEX idx_membresias_estado     ON membresias (estado);
