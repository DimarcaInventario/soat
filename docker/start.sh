#!/bin/sh
set -e
cd /app
php artisan storage:link --force || true
php artisan migrate --force
export SERVER_NAME=":${PORT:-8080}"
exec frankenphp run --config /etc/caddy/Caddyfile
