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

That is not enough. More details to follow.