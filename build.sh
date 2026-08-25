sudo chown -R www-data:www-data /var/www/html/wordpress/wp-content/themes/terna-theme-wp
sudo -u www-data composer install
sudo chown -R $USER:$USER /var/www/html/wordpress/wp-content/themes/terna-theme-wp
npm install
npm run build
sudo chown -R www-data:www-data /var/www/html/wordpress/wp-content/themes/terna-theme-wp