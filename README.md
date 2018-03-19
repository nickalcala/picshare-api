# Sample Application
## Running the application
```
$ docker-compose up
```

```
$ docker exec <container> cp .env.example .env

$ docker exec <container> php artisan key:generate

$ docker exec <container> php artisan migrate:refresh --seed
```