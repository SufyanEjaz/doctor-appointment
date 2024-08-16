# Use the official PHP 8.2 image as the base image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html/doctor-appointment

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the existing application directory contents
COPY . /var/www/html/doctor-appointment

# Copy the existing application directory permissions
COPY --chown=www-data:www-data . /var/www/html/doctor-appointment

# Copy the environment file
COPY .env.example .env

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm", "-F"]
