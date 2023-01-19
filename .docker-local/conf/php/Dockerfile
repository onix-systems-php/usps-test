FROM php:8.2-fpm

RUN rm /bin/sh && ln -s /bin/bash /bin/sh

RUN apt-get update && apt-get install -y \
        libzip-dev \
        libpq-dev \
        curl \
        zip \
        git \
    && docker-php-ext-install -j$(nproc) pgsql \
    && docker-php-ext-install -j$(nproc) pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
