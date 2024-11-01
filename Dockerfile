FROM php:8.2.25-apache
ARG DEBIAN_FRONTEND=noninteractive

# Establece el directorio de trabajo
WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install -y libpng-dev \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && apt-get install -y libonig-dev nano mc \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install zip pdo pdo_mysql
#RUN docker-php-ext-install mysqli
#RUN docker-php-ext-install mbstring
#RUN docker-php-ext-install gd

RUN a2enmod rewrite

# Copiar los archivos de la aplicación al contenedor
COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

#RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

#RUN php composer-setup.php

#RUN php -r "unlink('composer-setup.php');"

#RUN php composer.phar install

RUN composer install

RUN mv .env.example .env

RUN php artisan key:generate

RUN chmod 777 /var/www/html/ -R

ENV APP_URL https://app.planeadoreslaplata.org.ar

# Exponer el puerto 80 para el servicio web
EXPOSE 80
