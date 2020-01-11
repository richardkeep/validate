# Easily Validate Form Inputs

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
    'Richardkeep\Validate\RichardkeepServiceProvider'
];
```

Publish the assets

```js
php artisan vendor:publish
```

Place this code below the link of jQuery library

```php
@include('richard::validate');
```

Open `app\Http\Middleware\VerifyCsrfTokenCheck.php` add `validate to the URI that should be excluded from CSRF check
```php
/**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'validate'
    ];
```

Open `config\richard.php` and add the validation rules. For example,

```php
'rules' => [
    'name' => 'required|min:5',
    'email' => 'required|email', 
];
```

When a user starts typing, for example their email, the data is validated and the error message is displayed below the text box immediately. 

![image1](http://s18.postimg.org/rg6iaabwp/email1.png)

![image2](http://s24.postimg.org/dyfosc1ad/email2.png)

In addition, the submit button is disabled if an error is returned.

Please try it guys. 

Pull requests are highly welcomed. 
