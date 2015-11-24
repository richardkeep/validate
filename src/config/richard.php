<?php

return [
	
	/*
    |--------------------------------------------------------------------------
    | Route
    |--------------------------------------------------------------------------
    |
    | Register the route that will be used to send the request
    |
    |
    */
	
	'route' => '/validate',

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
		'invoice_no'	=> 'required|digits:6|unique:invoices,invoice_no',
		'client_name'	=> 'required|min:5',
		'client_country'=> 'required|min:5',
		'email'			=> 'required|email',
		'address'		=> 'required|address',
		'town'			=> 'required|min:3',
		'mobile'		=> 'required|min:9',
		'bf_no'			=> 'required|bf_no',
		'yor'			=> 'required|yor',
		'make_id'			=> 'required|numeric',
		'model_id'			=> 'required|numeric',
		'chassis_no'	=> 'required|min:5',
		'transmission'	=> 'required|min:3',
		'weight'		=> 'required|numeric',
		'dimension'		=> 'required|min:10',
		'engine_cc'		=> 'required|max:5000|numeric',
		'color'			=> 'required|min:3',
		'mileage'		=> 'required|numeric',
		'fuel_type'		=> 'required',
		'price'			=> 'required|min:3|numeric',
		'cap'			=> 'required|cap',
		'amount'     	=> 'required|numeric',
		'username' => 'required|max:25|unique:users',
		'name' => 'required|max:255',
		'email' => 'required|email|max:255|unique:users',
		'password' => 'required|confirmed|min:6',
	]

];