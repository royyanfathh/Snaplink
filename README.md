# URL Shortener

![Laravel](https://img.shields.io/badge/Laravel-Latest-red)
![PHP](https://img.shields.io/badge/PHP-8.1+-blue)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange)
![CSS](https://img.shields.io/badge/CSS-Vanilla-blueviolet)
![License](https://img.shields.io/badge/license-MIT-green)

---

## Description

**URL Shortener** is a simple web-based application built with Laravel that allows users to shorten long URLs into cleaner, shorter, and easier-to-share links.

This application is designed to provide a fast and efficient way to generate shortened links while maintaining a clean and minimal user experience.

Main functionalities include:

- shorten long URLs instantly
- generate unique short links automatically
- redirect short URLs to their original destination
- track total clicks for each generated link

This project was developed as a lightweight portfolio project to demonstrate fundamental web development concepts using Laravel, including routing, validation, database operations, and URL redirection.

---

## Features

### URL Shortening
- convert long URLs into short links
- automatic random short code generation

Example:

```text
https://www.google.com/search?q=laravel
↓
http://localhost:8000/aB12Cd
```

---

### Redirection
- automatically redirect generated short links to the original URL

---

### Hit Counter
- record and display total visits for each shortened URL

---

## Tech Stack

### Backend
- PHP 8.1+
- Laravel 13.7
- MySQL

### Frontend
- Blade Template Engine
- HTML
- Vanilla CSS
- JavaScript

---

## Requirements

Before installation, make sure your system has:

- PHP >= 8.1
- Composer
- MySQL / MariaDB
- Node.js >= 18
- NPM
- Git

---

## Installation

Clone the repository:

```bash
git clone https://github.com/royyanfathh/Url-Shortener.git
cd Url-Shortener
```

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Copy environment file:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Configure database in `.env`:

```env
DB_DATABASE=url_shortener
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations:

```bash
php artisan migrate
```

Build frontend assets:

```bash
npm run build
```

Run development server:

```bash
php artisan serve
```

Open in browser:

```text
http://127.0.0.1:8000
```

---

## Usage

### Create Short URL

1. Open the application homepage
2. Enter a long URL
3. Click **Shorten**
4. Copy the generated short URL

---

### Redirect to Original URL

Open the generated short URL:

```text
http://127.0.0.1:8000/aB12Cd
```

The system will automatically redirect to the original destination URL.

---

### Track Link Visits

Each time a shortened link is opened:
- the hit counter increases automatically

---

## Project Structure

```text
app/
├── Http/Controllers/
├── Models/

database/
├── migrations/

resources/
└── views/

routes/
└── web.php
```

---

## Screenshots

![Home Page](docs/home.png)

![Generated URL](docs/result.png)

---

## Author

**Royyan Fathh**

GitHub:  
https://github.com/royyanfathh

---

## License

This project is open-sourced under the MIT License.