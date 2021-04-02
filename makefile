install:
	php artisan key:generate
	php artisan db:wipe
	php artisan migrate:install
	php artisan migrate
	php artisan db:seed
