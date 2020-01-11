<?php

namespace Richardkeep\Validate;

use Illuminate\Support\ServiceProvider;
use Richardkeep\Validate\CustomValidations\ValidationExtended;

class RichardkeepServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'richard');

        $this->publishes([
            __DIR__.'/resources/js/app.js' => public_path("js/richardkeep/app.js"),
            __DIR__.'/config/richard.php' => base_path("config/richard.php"),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
    }
}
