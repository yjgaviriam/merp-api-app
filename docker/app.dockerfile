#####################################
# APP CONFIGURATION:
#####################################
FROM php:7.3.5-fpm-stretch

RUN apt-get update && apt-get install -y mysql-client libmcrypt-dev \
    && docker-php-ext-install pdo_mysql mbstring

