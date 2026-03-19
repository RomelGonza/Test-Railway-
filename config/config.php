<?php
// Database params — read from environment or use defaults
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
define('DB_NAME', getenv('DB_NAME') ?: 'ubvwmzhw_onta');

// App Root
define('APPROOT', dirname(dirname(__FILE__)) . '/app');
// URL Root — read from environment or use localhost
define('URLROOT', getenv('APP_URL') ?: 'http://localhost/onta/');
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
