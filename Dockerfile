# Dockerfile para ONTA QR Asistencia
# Framework: ONTA (PHP MVC propio)
# Deploy: Railway.app
# Nginx + PHP-FPM (funciona correctamente)

FROM php:8.2-fpm-alpine

# Instalar Nginx y herramientas
RUN apk add --no-cache nginx curl git unzip

# PHP Extensions
RUN docker-php-ext-install pdo pdo_mysql

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar configuración Nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/start.sh /start.sh

# Copiar proyecto
COPY . /var/www/html/

# Permisos
RUN chmod +x /start.sh && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    mkdir -p /var/www/html/public/uploads && \
    chmod 775 /var/www/html/public/uploads

# Composer
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

EXPOSE 80
CMD ["/start.sh"]
