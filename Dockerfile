# PHP + Apache
FROM php:8.0-apache

# Update OS and install common dev tools
RUN apt-get update
RUN apt-get install -y wget vim git zip unzip zlib1g-dev libzip-dev libpng-dev

RUN docker-php-ext-install mysqli pdo_mysql gd zip pcntl exif 
RUN docker-php-ext-enable mysqli

# Enable common Apache modules
RUN a2enmod headers expires rewrite

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Set working directory to web files
WORKDIR /var/www/html