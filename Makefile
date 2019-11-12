
start:
	docker-compose up -d wordpress

install:
	docker-compose run --rm community-fabricator composer install

update:
	docker-compose run --rm community-fabricator composer update

release:
	docker-compose run --rm community-fabricator ./release.sh

ps:
	docker-compose ps
