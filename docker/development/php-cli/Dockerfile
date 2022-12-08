FROM php:8.1-cli-alpine

RUN apk add --no-cache autoconf g++ make \
    && pecl install xdebug \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable xdebug

RUN apk add --no-cache unzip wget bash git

RUN docker-php-ext-install pdo pdo_mysql

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./docker/development/php/conf.d /usr/local/etc/php/conf.d

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet
WORKDIR /app
COPY composer.json composer.lock ./
CMD composer install
WORKDIR /app/src/model
CMD php init.php


