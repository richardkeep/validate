<?php namespace RichardKeep\Validate;

use Illuminate\Support\ServiceProvider;
use RichardKeep\Validate\CustomValidations\ValidationExtended;

class RichardKeepServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadViewsFrom(__DIR__.'/views','richard');

		$this->app->validator->resolver(function ($translator, $data, $rules, $messages = array(), $customAttributes = array()){
			return new ValidationExtended($translator, $data, $rules, $messages, $customAttributes);
		});

		$this->publishes([
			__DIR__.'/views/app.js' => public_path("js/richardkeep/app.js"),
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
