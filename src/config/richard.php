<?php

return [
	/*
    |--------------------------------------------------------------------------
    | Validation Rules
    |--------------------------------------------------------------------------
    |
    | Outline all the validation rules here
    |
    |
    */

	'rules' => [
		'name' => 'required|max:255',
		'email' => 'required|email'
	]

];
