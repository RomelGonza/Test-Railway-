-- ============================================================================
-- SISTEMA DE ASISTENCIA POR QR - Script SQL Completo
-- Framework ONTA | Congreso de Investigación 2026
-- ============================================================================

-- ============================================================================
-- 1. ALTERAR TABLA users (agregar columnas)
-- ============================================================================
ALTER TABLE users ADD COLUMN role VARCHAR(20) DEFAULT 'attendee';
ALTER TABLE users ADD COLUMN api_token VARCHAR(64) DEFAULT NULL;
-- Roles posibles: attendee | scanner | admin

-- ============================================================================
-- 2. CREAR TABLA events
-- ============================================================================
CREATE TABLE events (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  event_date DATE NOT NULL,
  location VARCHAR(255),
  active TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================================================
-- 3. CREAR TABLA attendance_tokens (tokens QR por usuario/evento)
-- ============================================================================
CREATE TABLE attendance_tokens (
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
-- 4. CREAR TABLA attendance (registro de asistencia)
-- ============================================================================
CREATE TABLE attendance (
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
-- 5. INSERTAR EVENTO DE PRUEBA
-- ============================================================================
INSERT INTO events (name, event_date, location, active)
VALUES ('Congreso de Investigación 2026', '2026-06-15', 'Auditorio Principal', 1);

-- ============================================================================
-- FIN del script
-- ============================================================================
