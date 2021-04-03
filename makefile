install:
	php artisan key:generate
	php artisan storage:link
	php artisan db:wipe
	php artisan migrate:install
	php artisan migrate
	php artisan db:seed

generate:
	php artisan ide-helper:generate
	php artisan ide-helper:models
	php artisan ide-helper:meta
