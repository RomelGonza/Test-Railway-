# Dockerfile para ONTA QR Asistencia
# Framework: ONTA (PHP MVC propio)
# Deploy: Railway.app

FROM php:8.2-apache

# Instalar extensiones y dependencias necesarias
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Instalar PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Habilitar mod_rewrite (requerido por ONTA)
#RUN a2enmod rewrite

# Deshabilitar otros MPMs y dejar solo mpm_prefork
#RUN a2dismod mpm_event mpm_worker || true
# Desactivar todos los MPMs conflictivos completamente
RUN rm -f /etc/apache2/mods-enabled/mpm_*.load
RUN a2enmod mpm_prefork rewrite

# Crear archivo de configuración limpio para Apache
RUN echo "# Configuración ONTA\n\
<Directory /var/www/html/public>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
    <IfModule mod_rewrite.c>\n\
        RewriteEngine On\n\
        RewriteBase /\n\
        RewriteCond %{REQUEST_FILENAME} !-f\n\
        RewriteCond %{REQUEST_FILENAME} !-d\n\
        RewriteRule . /index.php [L]\n\
    </IfModule>\n\
</Directory>" > /etc/apache2/conf-available/onta.conf

RUN a2enconf onta

# Configurar DocumentRoot apuntando a /public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's|DocumentRoot /var/www/html/public|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Copiar proyecto al contenedor
COPY . /var/www/html/

# Establecer permisos correctos
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    chmod -R 775 /var/www/html/public/uploads

# Instalar dependencias Composer
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Exponer puerto 80
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]
