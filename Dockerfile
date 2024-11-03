# Use an official PHP runtime with Apache as a parent image
FROM php:8.3-apache

# Install the mysqli extension
RUN docker-php-ext-install mysqli

# Install PDO and the PDO MySQL driver
RUN docker-php-ext-install pdo pdo_mysql

# Copy your application code to the container (assuming your code is in the current directory)
COPY . /var/www/html/

# Make sure the directory permissions are correct
RUN chown -R www-data:www-data /var/www/html

# Apache is already configured to run in the foreground by the base image
