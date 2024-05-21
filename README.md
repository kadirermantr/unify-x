# Unify-X

- **Programming Language:** PHP
- **Framework:** Laravel
- **Authentication:** [Laravel Passport](https://laravel.com/docs/passport)
- **API Documentation:** [Unify-X - Api Doc](https://documenter.getpostman.com/view/17277990/2sA3QngtHe)
- **API Testing:** Postman
- **Database Diagram:** [Diagram](https://dbdiagram.io/d/Unify-X-664c34e4f84ecd1d22b58a7c)

## Installation

```bash
cp .env.example .env
composer install
php artisan migrate
php artisan key:generate 
php artisan passport:client --personal
```
