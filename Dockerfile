# Dockerfile para ONTA QR Asistencia
# Framework: ONTA (PHP MVC propio con .htaccess routing)
# Deploy: Railway.app
# Usando Apache + PHP

FROM php:8.2-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP
RUN docker-php-ext-install pdo pdo_mysql

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Habilitar módulos Apache
RUN a2enmod rewrite headers ssl

# Copiar proyecto ANTES de modificar Apache config
COPY . /var/www/html/

# Crear nueva configuración Apache limpia
RUN rm -f /etc/apache2/sites-enabled/* && \
    echo '<VirtualHost *:80>' > /etc/apache2/sites-available/onta.conf && \
    echo '    ServerAdmin admin@onta.local' >> /etc/apache2/sites-available/onta.conf && \
    echo '    DocumentRoot /var/www/html/public' >> /etc/apache2/sites-available/onta.conf && \
    echo '    ' >> /etc/apache2/sites-available/onta.conf && \
    echo '    <Directory /var/www/html/public>' >> /etc/apache2/sites-available/onta.conf && \
    echo '        Options Indexes FollowSymLinks' >> /etc/apache2/sites-available/onta.conf && \
    echo '        AllowOverride All' >> /etc/apache2/sites-available/onta.conf && \
    echo '        Require all granted' >> /etc/apache2/sites-available/onta.conf && \
    echo '    </Directory>' >> /etc/apache2/sites-available/onta.conf && \
    echo '</VirtualHost>' >> /etc/apache2/sites-available/onta.conf && \
    a2ensite onta

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
