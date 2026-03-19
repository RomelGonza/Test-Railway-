<?php
/**
 * Language Helper
 * Manages translations and current language state
 */

function initLanguage() {
    // Check for language in URL
    if (isset($_GET['lang'])) {
        $lang = filter_input(INPUT_GET, 'lang', FILTER_SANITIZE_STRING);
        $_SESSION['lang'] = $lang;
    }

    // Default language
    if (!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = 'es';
    }

    $currentLang = $_SESSION['lang'];
    $langPath = APPROOT . '/lang/' . $currentLang . '.php';

    if (file_exists($langPath)) {
        $GLOBALS['translations'] = require $langPath;
    } else {
        // Fallback to Spanish if requested file doesn't exist
        $GLOBALS['translations'] = require APPROOT . '/lang/es.php';
    }
}

/**
 * Translate a key
 * 
 * @param string $key Dot-notation key (e.g. 'nav.home')
 * @return string Translated text
 */
function _t($key) {
    if (!isset($GLOBALS['translations'])) {
        return $key;
    }

    $keys = explode('.', $key);
    $translation = $GLOBALS['translations'];

    foreach ($keys as $k) {
        if (isset($translation[$k])) {
            $translation = $translation[$k];
        } else {
            return $key; // Return key if not found
        }
    }

    return $translation;
}

function getCurrentLang() {
    return isset($_SESSION['lang']) ? strtoupper($_SESSION['lang']) : 'ES';
}
