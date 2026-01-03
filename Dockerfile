FROM php:8.5-apache

RUN apt-get update && apt-get install -y \
    libpq-dev zip unzip git \
    && docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN a2enmod rewrite

COPY ./docker/000-default.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html
