# Para instalar

1. docker exec laravel-app bash
2. cp .env.example .env
3. Configure a base de dados no .env
4. composer install
5. php artisan key:generate
6. php artisan jwt:secret
7. php artisan migrate
