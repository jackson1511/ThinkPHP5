FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
   libonig-dev \
   libjpeg-dev \
   libpng-dev \
   libfreetype6-dev \
   libxml2-dev \
   libzip-dev \
   && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql mbstring opcache

RUN a2enmod rewrite

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html/public

RUN sed -i 's|/var/www/html|/var/www/html/public|' /etc/apache2/sites-available/000-default.conf

RUN echo '<Directory /var/www/html/public>\n\
   AllowOverride All\n\
   Require all granted\n\
</Directory>' > /etc/apache2/conf-available/thinkphp.conf \
   && a2enconf thinkphp

EXPOSE 80

CMD ["apache2-foreground"]