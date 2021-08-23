git pull
rm -rf vendor/
composer install --optimize-autoloader --no-dev
rm public/storage
php artisan storage:link
systemctl restart apache2
echo "###########Everything is working fine##########"
echo "Don t forget to check .env "
