#!/bin/bash
# Инициализация MySQL, если база данных не существует
if [ ! -d "/var/lib/mysql/mysql" ]; then
    mysqld --initialize-insecure
    service mysql start
    mysql -e "CREATE DATABASE site_db;"
    mysql -e "CREATE USER 'site_user'@'localhost' IDENTIFIED BY 'secure_password';"
    mysql -e "GRANT ALL PRIVILEGES ON site_db.* TO 'site_user'@'localhost';"
    mysql -e "FLUSH PRIVILEGES;"
else
    service mysql start
fi

service php8.1-fpm start
service nginx start
tail -f /var/log/nginx/error.log /var/log/mysql/error.log
