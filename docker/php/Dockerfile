FROM php:fpm
RUN apt update && apt install -y \
    git \
    zip

RUN docker-php-ext-install pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /code