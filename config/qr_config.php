<?php
/**
 * Configuración del Sistema QR de Asistencia
 * Incluir este archivo en app/bootstrap.php
 */

// Clave secreta para generar tokens (leer de variable de entorno en producción)
define('QR_SECRET', getenv('QR_SECRET') ?: 'dev_secret_cambiar_en_produccion_min_32_chars_2025');

// Horas de expiración del token QR (desde su generación)
define('QR_EXPIRES_HOURS', getenv('QR_EXPIRES_HOURS') ?: 24);

// Tamaño del código QR en píxeles
define('QR_SIZE', 300);

// Rol para usuarios que pueden escanear
define('SCANNER_ROLE', 'scanner');

// Rol para administradores
define('ADMIN_ROLE', 'admin');

// Rol para asistentes
define('ATTENDEE_ROLE', 'attendee');

?>
