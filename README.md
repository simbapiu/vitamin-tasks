<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<br>

# Requirements to run the project

- ## Clone the project

- PHP 8.1.6
  - php-pgsql
  - php-curl
  - phpunit
<br><br>
- Composer latest version
- Postgresql
  - Create database
  `vitamin-tasks`
<br>
<br>  
- Create the `.env` file in the project root and paste the code from the git wiki: [Vitamin Task wiki](https://github.com/simbapiu/vitamin-tasks/wiki/Env-file)

- Run migrations and seed:
  ```
  php artisan migrate
  php artisan db:seed
  ```
