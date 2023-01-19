FROM php:8.2-fpm

RUN rm /bin/sh && ln -s /bin/bash /bin/sh

RUN apt-get update && apt-get install -y \
        libzip-dev \
        curl \
        zip \
        git \
    && docker-php-ext-install -j$(nproc) pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
