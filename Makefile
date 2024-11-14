init: docker-down docker-up init-key npm-install
up: docker-up
stop: docker-stop
down: docker-down
restart: down up


docker-stop:
	docker-compose stop
docker-build:
	docker-compose build
docker-up:
	docker-compose up -d
docker-down:
	docker-compose down --remove-orphans
composer-install:
	docker-compose exec cleaning_app composer install
npm-install:
	docker-compose exec cleaning_app npm ci
	docker-compose exec cleaning_app npm run build
init-key:
	docker-compose exec cleaning_app php artisan key:generate
init-migrations:
	docker-compose exec cleaning_app php artisan migrate
init-seed:
	docker-compose exec cleaning_app php artisan db:seed

