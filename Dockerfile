# Dockerfile para ONTA QR Asistencia
# Framework: ONTA (PHP MVC propio con .htaccess routing)
# Deploy: Railway.app
# Usando Apache + PHP (como fue diseñado ONTA)

FROM php:8.2-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Habilitar módulos Apache necesarios
RUN a2enmod rewrite headers

# Configurar DocumentRoot apuntando a /public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Configurar <Directory> para /public con AllowOverride All (para .htaccess)
RUN sed -i '/<Directory \/var\/www\/html\/public>/,/<\/Directory>/c\
<Directory /var/www/html/public>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' /etc/apache2/sites-available/000-default.conf

# Si lo anterior falla, agregar la configuración manualmente
RUN echo '<Directory /var/www/html/public>' >> /etc/apache2/conf-available/docker-php.conf && \
    echo '    Options Indexes FollowSymLinks' >> /etc/apache2/conf-available/docker-php.conf && \
    echo '    AllowOverride All' >> /etc/apache2/conf-available/docker-php.conf && \
    echo '    Require all granted' >> /etc/apache2/conf-available/docker-php.conf && \
    echo '</Directory>' >> /etc/apache2/conf-available/docker-php.conf && \
    a2enconf docker-php

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

# Exponer puerto 80
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]
