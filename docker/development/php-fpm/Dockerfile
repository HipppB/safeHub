FROM php:7.4.12-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY docker/development/php/conf.d /usr/local/etc/php/conf.d
COPY . /app

WORKDIR /app


