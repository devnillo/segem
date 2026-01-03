FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libpq-dev zip unzip \
    && docker-php-ext-install pdo pdo_pgsql

RUN a2enmod rewrite

COPY ./docker/000-default.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html
