FROM php:8.3-apache

ENV DEBIAN_FRONTEND=noninteractive

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip unzip \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libfreetype6-dev \
    libxslt1-dev \
    libpq-dev \
    libsqlite3-dev \
    libcurl4-openssl-dev \
    libssl-dev \
    libedit-dev \
    libsodium-dev \
    libargon2-dev \
    && rm -rf /var/lib/apt/lists/*

# Install common PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) \
       intl mbstring zip gd exif bcmath sockets soap pcntl opcache \
       mysqli pdo_mysql pdo_pgsql xsl

# Enable Apache modules
RUN a2enmod rewrite headers ssl

# Copy php.ini if you want custom settings
COPY ./php.ini /usr/local/etc/php/conf.d/custom.ini

# Set working directory
WORKDIR /var/www/html

# Create uploads and writable folders with full permissions
RUN mkdir -p /var/www/html/uploads /var/www/html/writable \
    && chmod -R 777 /var/www/html/uploads /var/www/html/writable

EXPOSE 80 443

CMD ["apache2-foreground"]
