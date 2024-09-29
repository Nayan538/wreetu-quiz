FROM php:8.1

RUN apt-get update -y && apt-get install -y openssl zip unzip build-essential

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    libpng-dev \
    && pecl install redis-5.3.7 \
    && docker-php-ext-enable redis \
    && docker-php-ext-install gd

RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /app
COPY . /app

#RUN composer install
#RUN composer require league/flysystem-aws-s3-v3 "^3.0" --with-all-dependencies
#RUN composer update
#RUN php artisan optimize:clear
#RUN php artisan migrate

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000
