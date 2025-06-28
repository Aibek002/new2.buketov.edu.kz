FROM php:8.1-fpm

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    php-mysql \
    php-mbstring \
    php-gd \
    php-intl \
    php-xml \
    php-curl \
    php-zip \
    curl \
    wget \
    vim \
    nano \
    git \
    unzip \
    ca-certificates \
    && apt-get clean

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN chmod +x /usr/local/bin/composer

# Optional: Install Yii2 TinyMCE if needed
# RUN composer require dosamigos/yii2-tinymce-lib "~1.0"

WORKDIR /var/www/html