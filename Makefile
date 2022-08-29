recreate: remove-db remove build up check-db fresh-db build-assets
restart: down up

build:
	vendor/bin/sail build

up:
	vendor/bin/sail up -d

down:
	vendor/bin/sail down --remove-orphans

remove:
	vendor/bin/sail down -v --remove-orphans

artisans:
	vendor/bin/sail artisan $(filter-out $@,$(MAKECMDGOALS))

composer:
	vendor/bin/sail composer $(filter-out $@,$(MAKECMDGOALS))

check-db:
	test -f "storage/framework/db/academy.sqlite" || touch "storage/framework/db/academy.sqlite"

remove-db:
	rm "storage/framework/db/academy.sqlite"

migrate-db:
	vendor/bin/sail artisan migrate

seed-db:
	vendor/bin/sail artisan db:seed

fresh-db:
	vendor/bin/sail artisan migrate:fresh --seed

build-assets:
	vendor/bin/sail npm run build
