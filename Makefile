
install:
	docker-compose run --rm composer install

start:
	docker-compose up -d wordpress

ps:
	docker-compose ps
