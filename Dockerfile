# Dockerfile para ONTA QR Asistencia
# Framework: ONTA (PHP MVC propio)
# Deploy: Railway.app
# Usando PHP-FPM + Nginx (sin conflictos de MPM)

FROM php:8.2-fpm-alpine

# Instalar nginx y dependencias
RUN apk add --no-cache \
    nginx \
    curl \
    git \
    unzip

# Instalar PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Limpiar configuración default de Nginx y copiar nuestra config
RUN rm -f /etc/nginx/conf.d/default.conf
COPY docker/nginx.conf /etc/nginx/conf.d/onta.conf
COPY docker/start.sh /start.sh

# Copiar proyecto al contenedor
COPY . /var/www/html/

# Establecer permisos correctos
RUN chmod +x /start.sh && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    mkdir -p /var/www/html/public/uploads && \
    chmod -R 775 /var/www/html/public/uploads

# Instalar dependencias Composer
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Exponer puerto 80
EXPOSE 80

# Comando por defecto
CMD ["/start.sh"]
