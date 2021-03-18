#!/bin/sh

echo '#### Moving to project directory ####'
cd /home/niall/Projects/GameHub

echo '#### Pulling code from git ####'
git pull

echo '#### Installing composer packages ####'
/usr/bin/php7.4 /usr/local/bin/composer install --optimize-autoloader --no-dev

echo '#### Running migrations ####'
php artisan migrate --force

echo '#### Optimizing config cache ####'
php artisan config:cache

echo '#### Optimizing route cache ####'
php artisan route:cache


echo '#### Optimizing view cache ####'
php artisan view:cache

echo '#### Deployment successful ####'
