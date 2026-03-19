# Dockerfile para ONTA QR Asistencia
# Framework: ONTA (PHP MVC propio)
# Deploy: Railway.app

FROM php:8.2-apache

# 1. Instalar extensiones PHP
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    zip unzip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. Habilitar mod_rewrite y headers (NO tocar MPM)
RUN a2enmod rewrite headers

# 3. Virtualhost apuntando a /public con AllowOverride All
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        Options Indexes FollowSymLinks\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# 4. Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Copiar proyecto
WORKDIR /var/www/html
COPY . .

# 6. Instalar dependencias PHP si existe composer.json
RUN if [ -f "composer.json" ]; then \
    composer install --no-dev --optimize-autoloader --no-interaction; \
    fi

# 7. Permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && mkdir -p /var/www/html/public/uploads \
    && chmod 775 /var/www/html/public/uploads

EXPOSE 80
CMD ["apache2-foreground"]