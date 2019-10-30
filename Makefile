
start:
	docker-compose up -d wordpress

install:
	docker-compose run --rm community-fabricator composer install

release:
	docker-compose run --rm community-fabricator ./release.sh

ps:
	docker-compose ps
