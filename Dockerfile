FROM php:8.1-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's !/var/www/html! ${APACHE_DOCUMENT_ROOT}! g' \
        /etc/apache2/sites-available/*.conf \
        /etc/apache2/apache2.conf

WORKDIR /var/www/html

COPY . /var/www/html