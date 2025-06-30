#!/bin/bash
echo "Starting Laravel build for Vercel..."

# Install Composer dependencies
composer install --no-dev --optimize-autoloader

# Create necessary directories
mkdir -p /tmp/storage/framework/cache
mkdir -p /tmp/storage/framework/sessions
mkdir -p /tmp/storage/framework/views

echo "Build completed successfully!" 