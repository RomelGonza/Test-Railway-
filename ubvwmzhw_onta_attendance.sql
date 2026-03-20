-- ============================================================================
-- SISTEMA DE ASISTENCIA POR QR - Script SQL Completo
-- Framework ONTA | Congreso de Investigación 2026
-- Ejecutar en Railway MySQL desde cero
-- ============================================================================

-- ============================================================================
-- 1. CREAR BASE DE DATOS
-- ============================================================================
DROP DATABASE IF EXISTS ubvwmzhw_onta;
CREATE DATABASE ubvwmzhw_onta;
USE ubvwmzhw_onta;

-- ============================================================================
-- 2. CREAR TABLA users (base para asistencia)
-- ============================================================================
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role VARCHAR(20) DEFAULT 'attendee',
  user_category ENUM('miembro_onta','no_miembro','extranjero','nacional') DEFAULT 'no_miembro',
  dni VARCHAR(15) DEFAULT NULL,
  university VARCHAR(255) DEFAULT NULL,
  professional_school VARCHAR(255) DEFAULT NULL,
  phone VARCHAR(20) DEFAULT NULL,
  department VARCHAR(100) DEFAULT NULL,
  api_token VARCHAR(64) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ============================================================================
-- 3. INSERTAR USUARIO ADMIN DE PRUEBA
-- ============================================================================
-- Email: admin@onta.com | Password: password
INSERT INTO users (name, email, password, role)
VALUES ('Admin ONTA', 'admin@onta.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/ym', 'admin');

-- ============================================================================
-- 4. TABLA users - COLUMNAS YA INCLUIDAS EN CREACIÓN
-- ============================================================================
-- Las columnas role y api_token ya están en la tabla users
-- No se necesitan ALTER TABLE

-- ============================================================================
-- 5. CREAR TABLA events
-- ============================================================================
CREATE TABLE IF NOT EXISTS events (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  event_date DATE NOT NULL,
  location VARCHAR(255),
  active TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================================================
-- 6. CREAR TABLA attendance_tokens (tokens QR por usuario/evento)
-- ============================================================================
CREATE TABLE IF NOT EXISTS attendance_tokens (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  event_id INT NOT NULL,
  token VARCHAR(64) UNIQUE NOT NULL,
  expires_at DATETIME NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
  UNIQUE KEY unique_token_per_user_event (user_id, event_id)
);

-- ============================================================================
-- 7. CREAR TABLA attendance (registro de asistencia)
-- ============================================================================
CREATE TABLE IF NOT EXISTS attendance (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  event_id INT NOT NULL,
  token_used VARCHAR(64) NOT NULL,
  scanned_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  scanner_id INT,
  UNIQUE KEY unique_attendance (user_id, event_id),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
);

-- ============================================================================
-- 8. INSERTAR EVENTO DE PRUEBA
-- ============================================================================
INSERT INTO events (name, event_date, location, active)
VALUES ('Congreso de Investigación 2026', '2026-06-15', 'Auditorio Principal', 1);

-- ============================================================================
-- 9. CREAR USUARIOS DE PRUEBA (roles variados)
-- ============================================================================
INSERT INTO users (name, email, password, role)
VALUES 
  ('Scanner 1', 'scanner1@onta.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/ym', 'scanner'),
  ('Asistente 1', 'asistente1@onta.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/ym', 'attendee'),
  ('Asistente 2', 'asistente2@onta.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/ym', 'attendee')
ON DUPLICATE KEY UPDATE updated_at = CURRENT_TIMESTAMP;

-- ============================================================================
-- 10. TABLAS ADICIONALES (Abstracts, Agenda, Gallery, Inscriptions)
-- ============================================================================

CREATE TABLE IF NOT EXISTS abstracts (
  id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  user_id INT(11) NOT NULL,
  titulo VARCHAR(255) NOT NULL,
  autores TEXT NOT NULL,
  afiliacion VARCHAR(255) NOT NULL,
  correo VARCHAR(255) NOT NULL,
  keywords VARCHAR(255) NOT NULL,
  archivo_pdf VARCHAR(255) NOT NULL,
  estado ENUM('pendiente','en revision','aprobado','rechazado') DEFAULT 'pendiente',
  fecha_envio TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  codigo_seguimiento VARCHAR(10) DEFAULT NULL,
  UNIQUE KEY unique_tracking (codigo_seguimiento),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS agenda (
  id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  activity_title VARCHAR(255) NOT NULL,
  speaker VARCHAR(255) DEFAULT NULL,
  category VARCHAR(100) DEFAULT NULL,
  start_time DATETIME DEFAULT NULL,
  end_time DATETIME DEFAULT NULL,
  description TEXT,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS gallery (
  id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  category VARCHAR(100) DEFAULT NULL,
  image_path VARCHAR(255) DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS inscriptions (
  id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  user_id INT(11) DEFAULT NULL,
  full_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(50) DEFAULT NULL,
  country VARCHAR(100) DEFAULT NULL,
  institution VARCHAR(255) DEFAULT NULL,
  payment_status ENUM('pending','verified','rejected') DEFAULT 'pending',
  payment_receipt VARCHAR(255) DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- ============================================================================
-- FIN del script
-- ============================================================================
