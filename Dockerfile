# Dockerfile para ONTA QR Asistencia (Configuración Apache para Railway)
# Framework: ONTA (PHP MVC propio)
# Deploy: Railway.app

FROM php:8.2-apache

# 1. Instalar dependencias del sistema y extensiones de PHP requeridas por ONTA
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql

# 2. Habilitar mod_rewrite para que .htaccess funcione (CRÍTICO para ONTA)
RUN a2dismod mpm_event mpm_worker && a2enmod mpm_prefork rewrite headers

# 3. Cambiar el DocumentRoot de Apache a /var/www/html/public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 4. Configuración avanzada para asegurar que .htaccess sea respetado
RUN echo "<Directory \"/var/www/html/public\">\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>" > /etc/apache2/conf-available/onta-overrides.conf \
    && a2enconf onta-overrides

# 5. Instalar Composer (para endroid/qr-code)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. Copiar el código del proyecto
WORKDIR /var/www/html
COPY . .

# 7. Ejecutar composer install si existe composer.json
RUN if [ -f "composer.json" ]; then composer install --no-dev --optimize-autoloader; fi

# 8. Permisos adecuados para Apache y uploads
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && mkdir -p /var/www/html/public/uploads \
    && chmod 775 /var/www/html/public/uploads

EXPOSE 80
CMD ["apache2-foreground"]
