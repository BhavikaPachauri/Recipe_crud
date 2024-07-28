# Use an official PHP image as the base image
FROM php:8.0-apache

# Install necessary PHP extensions and other dependencies
RUN docker-php-ext-install pdo pdo_mysql

# Copy application code to the working directory
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Expose port 80
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]
