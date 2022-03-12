<h1 align="center"> Trustartup user system </h1> <br>

<p align="center">
  Микросервис для проекта Trustartup.
</p>


## Содержание

- [Вступление](#вступление)
- [Технологии](#технологии)
- [Использование](#использование)
- [API](#api)

## Вступление

Выполняет запросы CRUD связанные с пользователем и его ролями.

## Технологии

* Lumen (PHP framework)
* PostgreSQL (или любая база данных)
* Docker

## Использование
Микросервис может быть запущен локально или в докер контейнере.

### Локально
* [PHP 7.4+](https://www.php.net/downloads.php)
* [Composer](https://getcomposer.org/download/)
* [PostgreSQL](https://www.postgresql.org/download/)

Сначала установите зависимости:
```bash
composer install
```
Затем скопируйте `.env.example` в `.env` и измените переменные среды в зависимости от вашего окружения

Для инициализации базы данных:

```bash
php artisan migrate --seed
```

Запустите микросервис:
```bash
php -S localhost:8000 -t public
```

### Docker
* [Docker](https://www.docker.com/get-docker)

### Run Local

Сначала постройте образ:
```bash
docker-compose build
```

Запустите микросервис:
```bash
docker-compose up -d
```

Application will run by default on port `8084`

Configure the port by changing `server.port` in `docker-compose.yaml`

## API
[Полная api-документация в формате OpenAPI3.0](storage/api-docs/api-docs.json)
