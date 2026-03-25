FROM php:8.2-apache

RUN a2enmod rewrite headers

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    libonig-dev \
    && docker-php-ext-install pdo_mysql mbstring zip pcntl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY . /var/www/html/
RUN mkdir -p /var/www/html/panel/graveyard/status \
             /var/www/html/panel/graveyard/data \
             /var/www/html/panel/graveyard/inst \
             /var/www/html/clients \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/clients \
    && chmod -R 777 /var/www/html/panel/graveyard \
    && chmod 777 /var/www/html/log.txt \
    && chmod 777 /var/www/html/bots_log.txt

EXPOSE 80
