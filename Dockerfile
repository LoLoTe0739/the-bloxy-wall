# Imagen oficial con PHP + Apache
FROM php:8.2-apache

# Copiar archivos al servidor
COPY . /var/www/html/

# Dar permisos
RUN chown -R www-data:www-data /var/www/html

# Apache escucha en el puerto 80
EXPOSE 80
