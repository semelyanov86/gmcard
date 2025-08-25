# GMCard Website

This is the project a GMCard, an application, which allows you to manage coupon codes easily. It was created to help organizations find new clients, who wants to save their money, while buying products.

## Requirements
if you use docker, you don't need to install any of the following requirements, but if you want to run the application locally, you need to install the following:

* PHP 8.4
* Composer
* Node.js 22.x
* NPM
* Postgresql

## Installation

GMCard is a Laravel and Inertia application; it's build on top of Laravel 12 and uses a PostgreSql database. If you are familiar with Laravel, you should feel right at home.

### Clone the repository:

```
git clone git@github.com:semelyanov86/gmcard.git
cd gmcard
```

Run Octane to start the development server:

```
task start
```

Install PHP dependencies:

```
composer install
```

Install Node.js dependencies:

```
npm install
task build
```

Copy the example environment file and generate an application key:

```
cp .env.example .env
php artisan key:generate
```

Create the PostgreSQL database and run migrations:

```
php artisan migrate --seed
```

## Packages

### For Prod

#### # [inertiajs/inertia-laravel](https://github.com/inertiajs/inertia-laravel)

Inertia is a connector between laravel and vue.js application

#### # [laravel/sanctum](https://github.com/laravel/sanctum)

This is an authentication package for backend

### For dev:

#### # [Pest](https://pestphp.com)

Pest is a testing framework with a focus on simplicity,
meticulously designed to bring back the joy of testing in PHP.

#### # [Larastan](https://github.com/nunomaduro/larastan)

Larastan focuses on finding errors in your code. It catches whole classes of bugs even before you write tests for the
code.

#### # [Laravel Pint](https://laravel.com/docs/10.x/pint)

Laravel Pint is an opinionated PHP code style fixer for minimalists.

#### # [Rector](https://github.com/rectorphp/rector)

Rector instantly upgrades and refactors the PHP code of your application.

#### # [Telescope](https://laravel.com/docs/10.x/telescope)

Telescope provides insight into the requests coming into your application, exceptions, log entries, database queries, queued jobs, mail, notifications, cache operations, scheduled tasks, variable dumps, and more.


## Testing

To run all tests, use the following command:

```
task test
```

To fix you code base before commit, use following command:

```
task fix
```

To run all checkers, like phpstan, rector:

```
task check
```

## SEO Commands

### Generate Sitemap

Generate sitemap.xml file for search engines:

```
php artisan sitemap:generate
```

This command automatically:
- Finds all GET routes in your application
- Sets appropriate priorities and update frequencies
- Creates `public/sitemap.xml` file

# License

This project is licensed under the GNU License. See the LICENSE file for details.
