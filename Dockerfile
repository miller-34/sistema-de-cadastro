FROM php:8.3-apache

RUN docker-php-ext-install mysqli \
    && printf 'ServerName localhost\n' > /etc/apache2/conf-available/servername.conf \
    && a2enconf servername

WORKDIR /var/www/html

COPY public/ ./
COPY src/ /var/www/src/

EXPOSE 80
