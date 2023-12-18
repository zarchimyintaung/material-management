# Set the base image to use
FROM php:8.1-fpm-alpine

# Update packages and install required dependencies
RUN apk update \
    && apk add --no-cache \
        bash \
        git \
        openssh-client \
        curl \
        libpng-dev \
        libjpeg-turbo-dev \
        libwebp-dev \
        libxpm-dev \
        libzip-dev \
        oniguruma-dev \
        libxml2-dev \
    && docker-php-ext-install \
        pdo_mysql 

# Set the working directory
WORKDIR /var/www/html

# Copy the code into the container
COPY . /var/www/html

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install the app dependencies
RUN composer install

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Run PHP-FPM
CMD ["php-fpm"]
