# EuroNyxi Laravel + DDEV Setup Guide

## Table of Contents
- [Local Development with DDEV](#local-development-with-ddev)
- [Server Deployment (Docker)](#server-deployment-docker)
- [Additional Configuration](#additional-configuration)

---

## Local Development with DDEV

### Prerequisites
- [DDEV](https://ddev.com/) installed
- Docker running locally

### 1. Clone the Project
```bash
git clone https://github.com/EuroNyxi/laravel-app.git
cd laravel-app
git checkout 1-setup-skeleton
```

### 2. Start DDEV
```bash
ddev start
```

### 3. Install Laravel Dependencies
```bash
ddev composer install
ddev exec php artisan key:generate
```

### 4. Configure Redis
Ensure Redis is running in DDEV (see `.ddev/config.yaml` for configuration).
Test Redis connection:
```bash
ddev exec php artisan tinker
```
In Tinker:
```php
Redis::set('test', 'value');
echo Redis::get('test'); // Should output "value"
```

### 5. Set Up Database
```bash
ddev exec php artisan migrate:fresh
```

### 6. Access Services
- **Laravel:** [https://euronyxi-laravel-app.ddev.site](https://euronyxi-laravel-app.ddev.site)
- **Mailpit:** [http://euronyxi-laravel-app.ddev.site:8025](http://euronyxi-laravel-app.ddev.site:8025)
- **Vite/Livereload:** [http://localhost:5173](http://localhost:5173)

### 7. Enable Xdebug (Optional)
```bash
ddev xdebug on
```

---

## Server Deployment (Docker)
*(To be added later)*

---

## Additional Configuration
*(To be added later)*