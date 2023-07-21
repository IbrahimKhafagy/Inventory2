FROM php:8.2
WORKDIR /code
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql
COPY . .
RUN composer install
RUN composer dump-autoload
RUN php artisan key:generate
CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181

#RUN composer install
#RUN composer update
#RUN php artisan clear-compiled
#RUN composer dump-autoload
#RUN php artisan key:generate
