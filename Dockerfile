FROM php:7.3-apache
RUN docker-php-ext-install mysqli
COPY php/ /var/www/html/
