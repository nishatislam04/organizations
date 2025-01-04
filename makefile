# Dockerized Laravel Operations

# Run Artisan commands
artisan:
	docker exec -it laravel_app php artisan $(CMD)

# Run Composer commands
composer:
	docker exec -it laravel_app composer $(CMD)

# Run migrations
migrate:
	docker exec -it laravel_app php artisan migrate:fresh --seed

# Start Tinker
tinker:
	docker exec -it laravel_app php artisan tinker

# Run Queue Worker
queue:
	docker exec -it laravel_app php artisan queue:work

# Run Bun commands
bun:
	docker exec -it laravel_vite bun $(CMD)
