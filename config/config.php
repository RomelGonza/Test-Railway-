<?php
// Database params — read from environment (Railway style) or use defaults
define('DB_HOST', getenv('MYSQLHOST') ?: getenv('DB_HOST') ?: 'localhost');
define('DB_USER', getenv('MYSQLUSER') ?: getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('MYSQLPASSWORD') ?: getenv('DB_PASS') ?: '');
define('DB_NAME', getenv('MYSQLDATABASE') ?: getenv('DB_NAME') ?: 'ubvwmzhw_onta');
define('DB_PORT', getenv('MYSQLPORT') ?: '3306');

// App Root
define('APPROOT', dirname(dirname(__FILE__)) . '/app');
// URL Root — read from environment or detect dynamically from request
if (getenv('APP_ENV') === 'production') {
    if (!empty(getenv('APP_URL'))) {
        $urlroot = getenv('APP_URL');
    } else {
        $forwarded_proto = $_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '';
        if ($forwarded_proto === 'https') {
            $scheme = 'https';
        } elseif (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
            $scheme = 'https';
        } else {
            $scheme = 'http';
        }
        $host = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? 'localhost';
        $urlroot = $scheme . '://' . $host;
    }
} else {
    // Development: sin slash final para consistencia con las vistas
    $urlroot = rtrim(getenv('APP_URL') ?: 'http://localhost/onta', '/');
}
// URLROOT sin slash final para evitar dobles slashes en rutas
define('URLROOT', rtrim($urlroot, '/'));
// Site Name
define('SITENAME', getenv('SITENAME') ?: 'ONTA PERU 2026');
// App Version
define('APPVERSION', '1.0.0');
// Debug Mode — true only if APP_ENV != production
define('DEBUG', getenv('APP_ENV') !== 'production');

// Google reCAPTCHA Keys (set via environment variables in production)
define('RECAPTCHA_SITE_KEY', getenv('RECAPTCHA_SITE_KEY') ?: '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI');
define('RECAPTCHA_SECRET_KEY', getenv('RECAPTCHA_SECRET_KEY') ?: '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe');
?>
