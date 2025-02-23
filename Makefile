init:
	docker-compose up -d --build
	@make fresh

fresh:
	docker compose exec php php artisan migrate:fresh
	docker compose exec php php artisan db:seed

restart:
	@make down
	@make up

up:
	docker-compose up -d

down:
	docker compose down --remove-orphans

cache:
	docker-compose exec php php artisan cache:clear
	docker-compose exec php php artisan config:cache
