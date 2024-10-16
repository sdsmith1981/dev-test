compose := $(if $(command -v docker-compose),docker-compose,docker compose)

composer:
	 docker run --rm --interactive --tty \
      --volume $(shell pwd):/app \
      composer/composer install
setup:
	make composer
	make start
start:
	$(compose) up -d
