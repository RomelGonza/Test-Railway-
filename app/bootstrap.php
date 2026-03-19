<?php
// Load Config
require_once dirname(__FILE__) . '/../config/config.php';

// Error Reporting
if (DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Load Helpers
require_once dirname(__FILE__) . '/helpers/url_helper.php';
require_once dirname(__FILE__) . '/helpers/session_helper.php';
require_once dirname(__FILE__) . '/helpers/language_helper.php';
require_once dirname(__FILE__) . '/helpers/security_helper.php';

// Initialize Language
initLanguage();

// Autoload Core Libraries
spl_autoload_register(function($className) {
    if (file_exists(dirname(__FILE__) . '/core/' . $className . '.php')) {
        require_once dirname(__FILE__) . '/core/' . $className . '.php';
    }
});

// Load Composer Autoloader (para endroid/qr-code y otras dependencias)
if (file_exists(dirname(__FILE__) . '/../vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/../vendor/autoload.php';
}

// Load QR Configuration
require_once dirname(__FILE__) . '/../config/qr_config.php';

// Load QR Helper Functions
require_once dirname(__FILE__) . '/helpers/qr_helper.php';
