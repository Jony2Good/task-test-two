install:
	composer install

update:
    composer update

dump:
    composer dump-autoload

stan:
    vendor/bin/phpstan analyse -c phpstan.dist.neon
