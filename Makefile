composer:
	 docker run --rm --interactive --tty \
      --volume $(shell pwd):/app \
      composer/composer install
setup:
	make composer
	make start
	./vendor/bin/sail artisan migrate
start:
	./vendor/bin/sail up -d
