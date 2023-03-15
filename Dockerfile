# Establecer la imagen base
FROM php:8.1-apache

# Instalar las dependencias necesarias
RUN apt-get update && \
    apt-get install -y \
        git \
        libicu-dev \
        libpq-dev \
        libzip-dev \
        unzip \
        zlib1g-dev

# Habilitar los módulos necesarios de PHP
RUN docker-php-ext-install \
        intl \
        pdo_mysql \
        pdo_pgsql \
        zip

# Descargar el código de la aplicación
RUN git clone https://github.com/user/myapp.git /var/www/html

# Copiar la configuración de Apache
COPY config/apache.conf /etc/apache2/sites-available/000-default.conf

# Copiar la configuración de PHP
COPY config/php.ini /usr/local/etc/php/

# Instalar phpMyAdmin
RUN apt-get update && \
    apt-get install -y phpmyadmin && \
    ln -s /usr/share/phpmyadmin /var/www/html/phpmyadmin

# Configurar phpMyAdmin para usar la base de datos MySQL
RUN sed -i 's/localhost/mysql/g' /etc/phpmyadmin/config.inc.php

# Exponer el puerto 80 para que Apache sea accesible desde fuera del contenedor
EXPOSE 80
