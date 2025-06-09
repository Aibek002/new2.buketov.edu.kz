FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    nginx \
    php8.1-fpm \
    php8.1-mysql \
    php8.1-mbstring \
    php8.1-gd \
    php8.1-intl \
    php8.1-xml \
    php8.1-curl \
    php8.1-zip \
    mysql-server \
    curl wget vim nano git unzip ca-certificates \
    && apt-get clean
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer require dosamigos/yii2-tinymce-lib "~1.0"


# Копирование Composer
COPY composer /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer

# Установка phpMyAdmin
RUN echo "phpmyadmin phpmyadmin/dbconfig-install boolean true" | debconf-set-selections \
