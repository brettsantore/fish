FROM php:fpm
RUN apt update && apt install -y \
    git \
    zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /code