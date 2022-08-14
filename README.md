<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Project Local Setup Guide

Pre-requisite for MacOs
> composer - https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos
> php version 8.* - https://formulae.brew.sh/formula/php
> valet (local hosting for laravel) - https://laravel.com/docs/9.x/valet
> mysql - https://formulae.brew.sh/formula/mysql


#### Steps
1. Pull from the git.
2. ```cd``` to the root directory
3. Create .env at root directory and copy content from .env.example
4. At terminal, execute ```composer install```
5. Again at terminal, execute ```php artisan key:generate```
6. Create a database named "space-exploration" (up to your preference)
7. Open ```.env``` file and edit the follow key to your mysql server connection
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=space-console
    DB_USERNAME=root
    DB_PASSWORD=
8. At terminal, execute ```php artisan migrate``` (to create database tables) 
9. At terminal, execute ```php artisan db:seed``` (to seed in initial data that included the calculated Pi)
10. At the root folder, execute ```valet link``` (this will generate a local website link that can access with http://[root-folder-name].test, eg. http://naluri-be.test)

*Notes: to ensure valet using correct php version, perform ```valet use php@8.1``` at terminal to switch to correct php version*

#### Test Case
Run ```php artisan test``` to perform unit test
###### Case - Pi Algorithm with approved constant of Pi 
>Test the algorithm of Pi with sample provided from the reference link (http://www.math.com/tables/constants/pi.htm) of Pi value.
- Pass if the algorithm is exaclty same with the reference provided.