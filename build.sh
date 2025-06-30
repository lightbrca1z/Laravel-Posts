#!/bin/bash
set -e

echo "Starting Laravel build for Vercel..."

# Install Composer dependencies
composer install --no-dev --optimize-autoloader --no-interaction

# Create necessary directories
mkdir -p /tmp/storage/framework/cache
mkdir -p /tmp/storage/framework/sessions
mkdir -p /tmp/storage/framework/views

# Create database file if it doesn't exist
touch /tmp/database.sqlite

echo "Build completed successfully!" 