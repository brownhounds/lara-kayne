# Kanya Api

### Development

Start services:

Docker:

```bash
docker compose up -d
```

Make:

```bash
make start
```

Install dependencies:

1. Exec in to `php-cli` container:

Docker:

```bash
docker compose exec php-cli sh
```

Make:

```bash
make dev
```

2. Install dependencies:

Once attached to `php-cli` container run:

```bash
composer install
```

Stop Services:

Docker:

```bash
docker compose down
```

Make:

```bash
make stop
```
