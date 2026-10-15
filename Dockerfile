# Base PHP image with Apache
FROM php:8.2-apache

# Install MySQL extensions for PHP
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Enable Apache mod_rewrite for custom routes / .htaccess
RUN a2enmod rewrite

# Point Apache Document Root specifically to /var/www/html/public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy project files into Apache container
COPY . /var/www/html

# Set appropriate permissions for web server
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 for web traffic
EXPOSE 80
