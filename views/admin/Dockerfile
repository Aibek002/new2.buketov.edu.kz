FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive

# Установка Nginx, PHP и зависимостей
RUN apt-get update && apt-get install -y \
    nginx \
    php8.1 \
    php8.1-fpm \
    php8.1-mysql \
    php8.1-mbstring \
    php8.1-gd \
    php8.1-intl \
    php8.1-xml \
    php8.1-curl \
    php8.1-zip \
    curl \
    wget \
    vim \
    nano \
    git \
    unzip \
    ca-certificates \
    && update-ca-certificates \
    && apt-get clean

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && chmod +x /usr/local/bin/composer

# Настройка PHP-FPM
RUN sed -i 's|listen =.*|listen = /run/php/php8.1-fpm.sock|' /etc/php/8.1/fpm/pool.d/www.conf \
    && sed -i 's|;listen.owner =.*|listen.owner = www-data|' /etc/php/8.1/fpm/pool.d/www.conf \
    && sed -i 's|;listen.group =.*|listen.group = www-data|' /etc/php/8.1/fpm/pool.d/www.conf \
    && sed -i 's|;listen.mode =.*|listen.mode = 0660|' /etc/php/8.1/fpm/pool.d/www.conf

# Копирование конфигурации и сайта
COPY nginx-config.conf /etc/nginx/sites-available/default
COPY ./site /var/www/html
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Открытие портов
EXPOSE 80 443

# Копирование и запуск стартового скрипта
COPY start.sh /start.sh
RUN chmod +x /start.sh
CMD ["/start.sh"]
