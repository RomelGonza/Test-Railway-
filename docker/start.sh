#!/bin/sh
set -e

# Iniciar PHP-FPM en background
php-fpm &
PHP_FPM_PID=$!

# Iniciar Nginx en foreground
exec nginx -g 'daemon off;'
