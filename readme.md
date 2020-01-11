# Easily Validate Form Inputs in Laravel

## Installation
First, pull in the package through Composer.

```bash
composer require richardkeep/validate
```

The package will automatically register its service provider.

To publish the config file to config/richard.php run:

php artisan vendor:publish --provider="Richardkeep\Validate\RichardkeepServiceProvider"

This is the default contents of the configuration:

```php
return [
    'rules' => [
        'password' => 'required|min:3'
    ]
];
```

## Usage
Place this code in your layout file or anywhere you want to use it.

```php
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
@include('richard::validate')
```

for example,
```html
<!DOCTYPE html>
<html>
    <head>
        <title>Update Password</title>
    </head>
    <body>
        <div
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control">
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" defer></script>
    @include('richard::validate')
</html>
```

## Ignore CSRF-Token Check
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

## Customizations

Open `config\richard.php` and add more validation rules. For example,

```php
'rules' => [
    'password' => 'required|min:3',
    'name' => 'required|min:5', 
];
```

When a user starts typing, for example their email, the data is validated and the error message is displayed below the text box immediately. 

![Capture](https://user-images.githubusercontent.com/3874381/72202629-eae4ca00-3472-11ea-9e40-28e1560720fa.JPG)

Please try it guys. 

Pull requests are highly welcomed. 
