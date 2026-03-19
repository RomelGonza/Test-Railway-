# Dockerfile ONTA — Railway.app
# Fix: limpieza forzada de MPM en entrypoint para evitar conflictos de caché

FROM php:8.2-apache

# 1. Extensiones PHP
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip unzip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. Limpiar TODOS los MPM y dejar solo prefork
# Esto resuelve el conflicto independientemente del caché de Railway
RUN cd /etc/apache2/mods-enabled \
    && rm -f mpm_event.conf mpm_event.load \
              mpm_worker.conf mpm_worker.load \
              mpm_prefork.conf mpm_prefork.load \
    && ln -s ../mods-available/mpm_prefork.conf mpm_prefork.conf \
    && ln -s ../mods-available/mpm_prefork.load mpm_prefork.load

# 3. Habilitar módulos necesarios
RUN a2enmod rewrite headers

# 4. Virtualhost apuntando a /public
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        Options Indexes FollowSymLinks\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# 5. Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 6. Proyecto
WORKDIR /var/www/html
COPY . .

# 7. Dependencias Composer
RUN if [ -f "composer.json" ]; then \
    composer install --no-dev --optimize-autoloader --no-interaction; \
    fi

# 8. Permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && mkdir -p /var/www/html/public/uploads \
    && chmod 775 /var/www/html/public/uploads

EXPOSE 80

# Entrypoint: verificar y limpiar MPM antes de arrancar Apache
# Garantiza estado correcto incluso con caché de Railway
CMD bash -c "\
    cd /etc/apache2/mods-enabled && \
    rm -f mpm_event.conf mpm_event.load mpm_worker.conf mpm_worker.load && \
    ls mpm_prefork.load > /dev/null 2>&1 || \
        (ln -s ../mods-available/mpm_prefork.conf mpm_prefork.conf && \
         ln -s ../mods-available/mpm_prefork.load mpm_prefork.load) && \
    apache2-foreground"