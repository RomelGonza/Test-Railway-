<?php
/**
 * QR Code Helper Functions
 * Genera códigos QR en PNG y base64
 * 
 * Intenta usar endroid/qr-code v3.0+ si está disponible via Composer.
 * Si no, usa phpqrcode como fallback (una sola librería sin dependencias).
 */

/**
 * Genera un código QR en PNG y retorna los bytes como string
 * 
 * @param string $token_string Contenido del QR (típicamente un token SHA256)
 * @param int $size Tamaño del QR en píxeles (default: QR_SIZE de config)
 * @return string|false Bytes PNG como string, o false si hay error
 */
function generate_qr_png($token_string, $size = null) {
    if ($size === null) {
        $size = defined('QR_SIZE') ? QR_SIZE : 300;
    }

    // Intenta usar endroid/qr-code (Composer)
    if (function_exists('class_exists') && class_exists('Endroid\QrCode\QrCode')) {
        try {
            $qrCode = new \Endroid\QrCode\QrCode($token_string);
            $qrCode->setSize($size);
            $qrCode->setMargin(10);
            
            // Generar PNG en memoria
            $writer = new \Endroid\QrCode\Writer\PngWriter();
            $result = $writer->write($qrCode);
            
            return $result->getString();
        } catch (Exception $e) {
            error_log('Error generando QR con endroid: ' . $e->getMessage());
            // Fall through a phpqrcode
        }
    }

    // Fallback: phpqrcode (incluida localmente si existe)
    return _generate_qr_png_phpqrcode($token_string, $size);
}

/**
 * Genera un código QR en formato base64 para embeber en HTML
 * 
 * @param string $token_string Contenido del QR
 * @param int $size Tamaño del QR en píxeles
 * @return string|false Base64 del PNG precedido por "data:image/png;base64,", o false si hay error
 */
function generate_qr_base64($token_string, $size = null) {
    $png_bytes = generate_qr_png($token_string, $size);
    
    if ($png_bytes === false) {
        return false;
    }
    
    return 'data:image/png;base64,' . base64_encode($png_bytes);
}

/**
 * Fallback: Genera QR usando phpqrcode (librería simple, sin dependencias)
 * Descargable desde http://phpqrcode.sourceforge.net/
 * Si no existe, retorna false.
 * 
 * @param string $data Datos a codificar
 * @param int $size Tamaño aproximado en píxeles
 * @return string|false Bytes PNG como string, o false
 */
function _generate_qr_png_phpqrcode($data, $size = 300) {
    // Ruta donde debería estar phpqrcode si se descarga manualmente
    $phpqrcode_path = dirname(__FILE__) . '/../vendor/phpqrcode/qrlib.php';
    
    // Alternativa: buscar en directorios comunes
    if (!file_exists($phpqrcode_path)) {
        $phpqrcode_path = dirname(__FILE__) . '/../../vendor/phpqrcode/qrlib.php';
    }
    
    if (!file_exists($phpqrcode_path)) {
        error_log('phpqrcode no encontrado en ' . $phpqrcode_path . '. Instala: composer require phpqrcode/phpqrcode ^2.0');
        return false;
    }
    
    // Incluir librería
    require_once $phpqrcode_path;
    
    // Crear archivo temporal para capturar la imagen
    $temp_file = tempnam(sys_get_temp_dir(), 'qr_');
    
    try {
        // Generar QR
        QRcode::png($data, $temp_file, QR_ECLEVEL_L, $size / 100, 2);
        
        // Leer archivo
        $png_bytes = file_get_contents($temp_file);
        
        // Limpiar
        unlink($temp_file);
        
        return $png_bytes ? $png_bytes : false;
    } catch (Exception $e) {
        error_log('Error generando QR con phpqrcode: ' . $e->getMessage());
        if (file_exists($temp_file)) {
            unlink($temp_file);
        }
        return false;
    }
}

?>
