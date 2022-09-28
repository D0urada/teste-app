clone the project:
```sh
    git clone https://github.com/D0urada/teste-app.git
```

copy .env:
```sh
    cp .env.example .env
```
biuld docker:
```sh
    docker-compose up -d
```

run webpack:
```sh
    docker-compose run --rm npm run dev
```

enter the app container:
```sh
    docker exec -it Teste_app bash
```

install composer:
```sh
    composer install
```

generate app key:
```sh
    php artisan key:generate
```

create and populate db:
```sh
    php artisan migrate:refresh --seed
```

go to: http://localhost:8080

user:
```sh
    administrador@email.com
```

password:
```sh
    administrador
```
