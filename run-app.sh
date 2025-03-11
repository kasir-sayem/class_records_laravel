#!/bin/bash
# Make sure this file has executable permissions, run `chmod +x run-app.sh`

# Create PHP config directory first
mkdir -p /usr/local/etc/php/conf.d/

# Set up PHP configurations
echo "
memory_limit = 256M
max_execution_time = 300
upload_max_filesize = 64M
post_max_size = 64M
" > /usr/local/etc/php/conf.d/custom.ini

# Create necessary directories with proper permissions
mkdir -p storage/framework/views
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/logs
mkdir -p storage/app/pdf/cache
mkdir -p bootstrap/cache

# Set permissions for storage and cache directories
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chmod -R 775 storage/app/pdf/cache

# Skip ownership changes - they're causing errors
# These lines were causing errors with "illegal group name"
# chown -R www-data:www-data storage
# chown -R www-data:www-data bootstrap/cache
# chown -R www-data:www-data storage/app/pdf/cache

# Ensure Laravel logs are writable
touch storage/logs/laravel.log
chmod 664 storage/logs/laravel.log
# chown www-data:www-data storage/logs/laravel.log  # Removing this line

# Clear existing caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Run migrations and database seeding
php artisan migrate:fresh --force && \
php artisan db:seed --force

# Check if we're in Railway environment (look for specific files/directories)
if [ -f "/assets/scripts/prestart.mjs" ]; then
    # We're likely in Railway, run the Node.js script and start services
    node /assets/scripts/prestart.mjs /assets/nginx.template.conf /nginx.conf && \
    (php-fpm -y /assets/php-fpm.conf & nginx -c /nginx.conf)
else
    # We're in local development, just use artisan serve
    echo "Starting local development server..."
    php artisan serve
fi

# Optional: Add error checking
if [ $? -ne 0 ]; then
    echo "Error: Application startup failed"
    exit 1
fi

# Keep the script running (if needed)
tail -f storage/logs/laravel.log