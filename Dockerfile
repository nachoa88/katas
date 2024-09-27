FROM php:8.3.2-apache

WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libzip-dev \
    && docker-php-ext-install zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Copy existing application directory contents
COPY . /var/www/html

# Create a user with UID and GID of 1000 (same as host user)
RUN groupadd -g 1000 hostgroup && \
    useradd -u 1000 -g hostgroup -m hostuser

# Set permissions for the application directory
RUN chown -R hostuser:hostgroup /var/www/html

# Enable Apache rewrite module
RUN a2enmod rewrite

# Switch to the hostuser
USER hostuser

CMD ["apache2-foreground"]