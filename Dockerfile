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

RUN a2enmod rewrite

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN service apache2 restart

# Copiar los archivos de la aplicación al contenedor
COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

RUN mv .env.example .env

RUN php artisan key:generate

RUN chmod 777 /var/www/html/ -R

# Exponer el puerto 80 para el servicio web
EXPOSE 80
