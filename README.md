# Laravel Client for Secure Login Junction SLJ.me

[![Latest Stable Version](https://poser.pugx.org/slj-me/slj-laravel-client/v/stable.svg)](https://packagist.org/packages/slj-me/slj-laravel-client)
[![License](https://poser.pugx.org/slj-me/slj-laravel-client/license.svg)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/slj-me/slj-laravel-client.svg?style=flat-square)](https://packagist.org/packages/slj-me/slj-laravel-client)

## Introduction

This package is a Laravel client for Secure Login Junction.
It provides a simple way to integrate your Laravel application to log in with SLJ.me.

## Installation

Requirements:
- [PHP](https://php.net) >= 8
- [Composer](https://getcomposer.org) >= 2

To get the latest version, simply run:

```
composer require slj-me/slj-laravel-client
```

Then do vendor publish:

```
php artisan vendor:publish --provider="SLJ\SLJLaravelClient\SLJLaravelClientServiceProvider"
```

Modify user model:

```php
$this->fillable = [
    ...
    'slj_id',
    'slj_access_token',
    'slj_refresh_token',
];
$this->hidden = [
    ...
    'slj_id',
    'slj_access_token',
    'slj_refresh_token',
];
```

Add configuration to `config/services.php`

```php
'slj' => [    
  'client_id' => env('SLJ_CLIENT_ID'),  
  'client_secret' => env('SLJ_CLIENT_SECRET'),  
  'redirect' => env('SLJ_REDIRECT_URI'),
  'host' => env('SLJ_HOST'),
],
```

If you need to register the service provider manually. Open `config/app.php` and add the following to the `providers` array:

```php
SLJ\SLJLaravelClient\SLJLaravelClientServiceProvider::class,
```

Run the migrations:

```php
php artisan migrate
```

## Configuration

### SLJ Client ID and Secret

You will need to register your application with SLJ.me to receive a Client ID and Client Secret.
You can do this at [https://www.slj.me](https://www.slj.me).

### Environment variables

You can set the following environment variables in your `.env` file:

```
SLJ_CLIENT_ID="your_client_id"
SLJ_CLIENT_SECRET="your_client_secret"
SLJ_REDIRECT_URI="https://yourdomain.com/auth/slj/callback"
SLJ_HOST="https://auth.youdomain.com"
```

## TODO

- [x] Add tests

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please feel free to fork this package and contribute by submitting a pull request to enhance the functionalities.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
