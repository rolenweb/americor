up:
	docker-compose up -d
down:
	docker-compose down --remove-orphans
build:
	docker-compose build
composer-install:
	docker-compose run --rm php composer install
migrate:
	docker-compose exec php php yii migrate