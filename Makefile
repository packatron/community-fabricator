
start:
	docker-compose up -d wordpress

install:
	docker-compose run --rm community-fabricar composer install

release:
	docker-compose run --rm community-fabricar ./release.sh

ps:
	docker-compose ps
