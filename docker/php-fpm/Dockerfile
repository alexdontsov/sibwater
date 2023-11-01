FROM php:8.2-fpm

RUN apt-get update; \
    apt-get upgrade -y; \
    apt-get install -y curl \
            libssl-dev \
            pkg-config \
            libzip-dev \
            unzip \
            git; \
    rm -rf /var/lib/apt/lists/*

#RUN #docker-php-ext-install pdo_pgsql; \
#    docker-php-ext-install gd; \
#    php -r 'var_dump(gd_info());' \

#RUN pecl install xdebug \
#    && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN adduser www-data www-data
RUN usermod -u 1000 www-data

COPY ./application /var/www/html
WORKDIR /var/www/html

RUN composer install
RUN chown www-data:www-data -R var/
# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
