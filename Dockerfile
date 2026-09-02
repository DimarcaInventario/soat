FROM dunglas/frankenphp:1-php8.2

RUN install-php-extensions pdo_mysql zip opcache

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . /app

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts \
    && php artisan package:discover --ansi \
    && mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache

CMD ["sh", "docker/start.sh"]
