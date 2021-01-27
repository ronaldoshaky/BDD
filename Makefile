build: compose-up composer-install

compose-up:
	docker-compose up -d

composer-install:
	docker-compose exec cli php tools/composer.phar install

test:
	docker-compose exec cli php bin/behat
