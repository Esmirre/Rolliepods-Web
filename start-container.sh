#!/bin/bash
# Railway (Railpack) start script. Replaces Railpack's default Laravel one so the
# database also gets its admin account and sample announcements on first deploy.
# Based on https://github.com/railwayapp/railpack/blob/main/core/providers/php/start-container.laravel.sh

set -e

echo "Running migrations ..."
php artisan migrate --force

# Creates the admin account and sample posts only if they don't exist yet.
php artisan db:seed --force

# Uploaded post images live in public/storage (see config/filesystems.php).
mkdir -p public/storage/posts

php artisan optimize:clear
php artisan optimize

echo "Starting Laravel server ..."
docker-php-entrypoint --config /Caddyfile --adapter caddyfile 2>&1
