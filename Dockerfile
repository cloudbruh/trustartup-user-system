FROM dwchiang/nginx-php-fpm:7.4.25-fpm-alpine3.14-nginx-1.21.1

RUN apk --no-cache add oniguruma-dev postgresql-dev && docker-php-ext-install pdo_pgsql

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

RUN composer install --optimize-autoloader --no-interaction --no-progress --no-dev
