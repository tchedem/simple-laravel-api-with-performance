#!/bin/bash
set -e

# # Step 1: Stop all containers and remove old images & volumes for a clean start
# docker compose -f compose.dev.yaml down --rmi all -v

# Step 2: Start all containers in detached mode
docker compose -f compose.dev.yaml up -d

# Step 3: Install PHP dependencies inside the workspace container
docker compose -f compose.dev.yaml exec workspace composer install

# Step 4: Install Node.js dependencies inside the workspace container
docker compose -f compose.dev.yaml exec workspace npm install

# Step 5: Run database migrations
docker compose -f compose.dev.yaml exec workspace php artisan migrate

# Step 6: Build frontend assets with Vite
docker compose -f compose.dev.yaml exec workspace npm run dev

# Step 7: Clean up all Laravel caches to prevent stale configurations
# This includes config, route, view caches and optimize cache.
# Note: You can suppress environment variable output by using --no-ansi if needed
for container in workspace php-fpm; do
    echo "Cleaning caches in $container..."
    docker compose -f compose.dev.yaml exec $container rm -rf bootstrap/cache/* bootstrap/cache/.* || true
    docker compose -f compose.dev.yaml exec $container php artisan config:clear
    docker compose -f compose.dev.yaml exec $container php artisan cache:clear
    docker compose -f compose.dev.yaml exec $container php artisan route:clear
    docker compose -f compose.dev.yaml exec $container php artisan view:clear
    docker compose -f compose.dev.yaml exec $container php artisan optimize:clear
done

# Step 8: Done! The Laravel app is ready and everything is cleaned
echo "Docker and Laravel setup completed!"
