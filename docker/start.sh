#!/bin/sh
set -e

# Esperar antes de iniciar para que los servicios estén listos
sleep 2

# Iniciar PHP-FPM en background
php-fpm -D

# Iniciar Nginx en foreground
exec nginx -g 'daemon off;'
