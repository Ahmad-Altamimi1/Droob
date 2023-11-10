# Droob
# Laravel Admin Dashboard for Articles

## Introduction
This Laravel project comes with a built-in admin dashboard for managing articles and viewing pages. Follow the instructions below to get started.

## Prerequisites
Make sure you have the following installed:
- PHP
- Composer
- Laravel

## Installation
1. Clone this repository: `git clone repository`
2. Navigate to the project directory: `cd <project-directory>`
3. Install dependencies: `composer install`
4. Copy the `.env.example` file to `.env`: `cp .env.example .env`
5. Generate an application key: `php artisan key:generate`

## Database Setup
1. Configure your database connection in the `.env` file.
2. Run migrations: `php artisan migrate:fresh --seed`

## Admin Dashboard
1. Access the admin dashboard by visiting `/admin/login` in your browser.
2. Log in using the default admin credentials:
   - Username: `admin@droob.com`
   - Password: `password`

## Adding Articles
1. In the admin dashboard, navigate to the "Articles" section.
2. Click on "Add Article" to create a new article.
3. Fill in the required fields and save.

## Viewing Pages
1. Visit the front-end of your application to view articles.
2. Pages displaying articles should be accessible through the defined routes.

## Customization
Feel free to customize routes, views, and controllers based on your project requirements.

That's it! You're ready to use the Laravel admin dashboard for managing articles.
