# Easily Validate Input Fields

## Installation

First, pull in the package through Composer.

```js
"require": {
    "richardkeep/validate": "~1.0"
}
```

And then, if using Laravel 5, include the service provider within `config/app.php`.

```php
'providers' => [
    'RichardKeep\Validate\RichardKeepServiceProvider'
];
```

Publish the assets

```js
$ php artisan vendor:publish
```

Place this code below the link of jQuery library

```php
@include('richard::validate');
```
