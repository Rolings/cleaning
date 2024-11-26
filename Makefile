init: docker-down docker-up composer-install   init-key  npm-install init-migrations init-seed
up: docker-up
stop: docker-stop
down: docker-down
restart: down up


docker-stop:
	docker compose stop
docker-build:
	docker compose build
docker-up:
	docker compose up -d
docker-down:
	docker compose down --remove-orphans
composer-install:
	docker compose exec cleaning_app composer install
npm-install:
	docker compose exec cleaning_app npm install
	docker compose exec cleaning_app npm run build
init-key:
	docker compose exec cleaning_app php artisan key:generate
	docker compose exec cleaning_app php artisan storage:link
init-migrations:
	docker compose exec cleaning_app php artisan migrate
init-seed:
	docker compose exec cleaning_app php artisan migrate:fresh --seed

