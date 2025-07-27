FROM php:8.1-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl \
    libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Enable Apache Rewrite
RUN a2enmod rewrite

# AllowOverride All agar .htaccess Laravel bisa jalan
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# 🔧 Set Apache Document Root ke folder Laravel public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# 🔧 Update Apache config agar pakai document root di atas
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Set working dir
WORKDIR /var/www/html

# Copy files
COPY . /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80



