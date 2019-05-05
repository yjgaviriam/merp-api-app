#####################################
# APP CONFIGURATION:
#####################################
FROM php:7.1.16-fpm

RUN apt-get update && apt-get install -y mysql-client libmcrypt-dev \ && docker-php-ext-install mcrypt pdo_mysql mbstring

#####################################
# XDEBUG:
#####################################

ARG INSTALL_XDEBUG=false
RUN if [ ${INSTALL_XDEBUG} = true ]; then \
    # Install the xdebug extension
    pecl install xdebug && \
    docker-php-ext-enable xdebug \
;fi

# Copy xdebug configration for remote debugging
COPY ./docker/xdebug.ini /usr/local/etc/php/conf.d/20-xdebug.ini


#####################################
# PHP REDIS EXTENSION FOR PHP 7
#####################################

ARG INSTALL_PHPREDIS=false
RUN if [ ${INSTALL_PHPREDIS} = true ]; then \
    # Install Php Redis Extension
    pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis \
;fi

#####################################
# Human Language and Character Encoding Support:
#####################################

ARG INSTALL_INTL=false
RUN if [ ${INSTALL_INTL} = true ]; then \
    # Install intl and requirements
    apt-get update -yqq && \
    apt-get install -y zlib1g-dev libicu-dev g++ && \
    docker-php-ext-configure intl && \
    docker-php-ext-install intl \
;fi