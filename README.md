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

---

# Manage Integration Command

**Signature:** `integration:manage {action} {id?} {--marketplace=} {--username=} {--password=}`

This command is used to manage integrations by allowing you to create, update, and delete integrations.

### Actions
- `create`: Create a new integration.
- `update`: Update an existing integration.
- `delete`: Delete an existing integration.

## Options

- `--marketplace=`: The marketplace for the integration (required for `create` and `update` actions).
- `--username=`: The username for authentication (required for `create` and `update` actions).
- `--password=`: The password for authentication (required for `create` and `update` actions).

## Usage

### Create an Integration

To create a new integration, use the `create` action and provide the required options:

```bash
php artisan integration:manage create --marketplace=trendyol --username=test@gmail.com --password=12345678
```

### Update an Integration

To update an existing integration, use the `update` action, provide the integration id, and the required options:

```bash
php artisan integration:manage update 1 --marketplace=hepsiburada --username=test@gmail.com --password=12345678
```

###  Delete an Integration

To delete an existing integration, use the `delete` action and provide the integration id:

```bash
php artisan integration:manage delete 1
```
