FROM php:8.3-fpm

RUN apt-get update 
# Копируем сертификат внутрь контейнера
COPY cacert.pem /usr/local/share/ca-certificates/cacert.crt

# Обновляем хранилище сертификатов
RUN update-ca-certificates
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql 

RUN apt-get install -y ffmpeg 

RUN apt install -y curl unzip 

RUN curl -sS https://getcomposer.org/installer | php 

RUN mv composer.phar /usr/local/bin/composer \
    && composer require guzzlehttp/guzzle
RUN composer require yidas/yii2-bower-asset
RUN composer require yiisoft/mailer-symfony
# # RUN composer require yiisoft/yii2-swiftmailer
# RUN composer clear-cache
# RUN composer install --prefer-dist --no-interaction --no-progress

# RUN composer require yiisoft/yii2-symfonymailer:^2.0
RUN composer require 2amigos/yii2-tinymce-widget



RUN apt update && \
    apt install -y curl unzip gnupg2 ca-certificates lsb-release && \
    echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list && \
    curl -fsSL https://packages.sury.org/php/apt.gpg | gpg --dearmor -o /etc/apt/trusted


RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

WORKDIR /var/www/html


RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini 
