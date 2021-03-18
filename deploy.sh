#!/bin/sh

PHP=/usr/bin/php7.4

echo '#### Moving to project directory ####'
cd /home/niall/Projects/GameHub

echo '#### Pulling code from git ####'
git pull

echo '#### Installing composer packages ####'
$PHP /usr/local/bin/composer install --optimize-autoloader --no-dev

echo '#### Running migrations ####'
$PHP artisan migrate --force

echo '#### Optimizing config cache ####'
$PHP artisan config:cache

echo '#### Optimizing route cache ####'
$PHP artisan route:cache


echo '#### Optimizing view cache ####'
$PHP artisan view:cache

echo '#### Deployment successful ####'
