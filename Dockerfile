FROM dwchiang/nginx-php-fpm:7.4.25-fpm-alpine3.14-nginx-1.21.1

COPY nginx/nginx-default.conf /etc/nginx/conf.d/default.conf

RUN apk --no-cache add oniguruma-dev postgresql-dev && docker-php-ext-install pdo_pgsql

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

RUN composer install --optimize-autoloader --no-interaction --no-progress --no-dev && \
    chown -R www-data:www-data /usr/share/nginx/html && \
    chown -R www-data:www-data /var/www/html && \
    find /var/www/html/storage -type f -exec chmod 664 {} \; && \
    find /var/www/html/storage -type d -exec chmod 770 {} \;
