install:
	composer install

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src tests	

brain-games:
    .\bin\brain-games

validate:
    composer validate