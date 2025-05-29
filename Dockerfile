FROM php:8.1-apache
# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    zip unzip git libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    #elimina archivos temporales
    && rm -rf /var/lib/apt/lists/*

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Configurar Apache para Laravel en modo escritura
RUN a2enmod rewrite
# Establecer el directorio de trabajo
WORKDIR /var/www/html
# Copiar el contenido al contenedor
COPY ./src/. /var/www/html
# Crear directorios necesarios antes de asignar permisos
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache
# Otorgar permisos
RUN chown -R www-data:www-data /var/www/html \
      && chmod -R 755 /var/www/html \
        && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

RUN docker-php-ext-install gd pdo pdo_mysql 

# Cambiar el DocumentRoot a /var/www/html/public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
# Comando de inicio del contenedor
CMD ["apache2-foreground"]


