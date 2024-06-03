start:
	docker compose up -d

stop:
	docker compose down

dev:
	docker compose exec php-cli sh
