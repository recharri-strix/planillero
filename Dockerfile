# Usa la imagen oficial de PHP con Apache
FROM php:8.1-apache

# Establece el directorio de trabajo
WORKDIR /var/www/html/planillero

# Instalar las extensiones necesarias para MySQL
RUN apt-get update && apt-get install -y default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql

# Copiar los archivos de la aplicación al contenedor
COPY . .

# Cambiar el propietario de los archivos
RUN chown -R www-data:www-data /var/www/html/planillero

# Habilitar el módulo de reescritura de Apache
RUN a2enmod rewrite

# Configurar el archivo de VirtualHost para Apache
RUN echo "<VirtualHost *:80> \n\
    ServerName docker.planillero \n\
    DocumentRoot /var/www/html/planillero \n\
    <Directory /var/www/html/planillero> \n\
        Options Indexes FollowSymLinks \n\
        AllowOverride All \n\
        Require all granted \n\
    </Directory> \n\
    ErrorLog ${APACHE_LOG_DIR}/error.log \n\
    CustomLog ${APACHE_LOG_DIR}/access.log combined \n\
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf

# Configurar PHP para mostrar errores
RUN echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-errors.ini

# Copiar el archivo de respaldo de la base de datos (si aplica)
COPY /database/dumps/dump_planillero.sql /shared_data/backup.sql

# Exponer el puerto 80 para el servicio web
EXPOSE 80
