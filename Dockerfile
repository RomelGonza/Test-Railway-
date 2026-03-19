# Dockerfile para ONTA QR Asistencia
# Framework: ONTA (PHP MVC propio)
# Deploy: Railway.app

FROM php:8.2-apache

# Instalar dependencias
RUN apt-get update && apt-get install -y curl git unzip && rm -rf /var/lib/apt/lists/*

# PHP Extensions
RUN docker-php-ext-install pdo pdo_mysql

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Apache Modules
RUN a2enmod rewrite headers

# Copiar proyecto
COPY . /var/www/html/

# Crear configuración Apache limpia y simple
RUN rm -rf /etc/apache2/sites-enabled/* && \
    cat > /etc/apache2/sites-available/onta.conf << 'EOF'
<VirtualHost *:80>
  ServerName localhost
  DocumentRoot /var/www/html/public
  
  <Directory /var/www/html/public>
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
  </Directory>
</VirtualHost>
EOF

RUN a2ensite onta && a2dissite 000-default

# Permisos
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html && \
    mkdir -p /var/www/html/public/uploads && chmod 775 /var/www/html/public/uploads

# Composer Install
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

EXPOSE 80
CMD ["apache2-foreground"]
