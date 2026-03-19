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

# Copiar proyecto al contenedor
COPY . /var/www/html/

# Establecer permisos correctos
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    mkdir -p /var/www/html/public/uploads && \
    chmod -R 775 /var/www/html/public/uploads

# Instalar dependencias Composer
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Configurar Nginx
RUN mkdir -p /etc/nginx/conf.d && \
    echo "server {\n\
    listen 80;\n\
    server_name _;\n\
    root /var/www/html/public;\n\
    index index.php;\n\
\n\
    location / {\n\
        try_files \$uri \$uri/ /index.php?\$query_string;\n\
    }\n\
\n\
    location ~ \\.php$ {\n\
        fastcgi_pass 127.0.0.1:9000;\n\
        fastcgi_index index.php;\n\
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;\n\
        include fastcgi_params;\n\
    }\n\
\n\
    location ~ /\\.ht {\n\
        deny all;\n\
    }\n\
}" > /etc/nginx/conf.d/default.conf

# Script de inicio para ejecutar PHP-FPM + Nginx
RUN mkdir -p /var/run/nginx && \
    echo "#!/bin/sh\n\
php-fpm -D\n\
nginx -g 'daemon off;'" > /startup.sh && \
    chmod +x /startup.sh

# Exponer puerto 80
EXPOSE 80

# Comando por defecto
CMD ["/startup.sh"]
