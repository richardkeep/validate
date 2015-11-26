<?php

Route::post('validate', function(Illuminate\Http\Request $request){

	$field = preg_replace('/-/', '_', $request->get('field'));
	
	$data = [
		"{$field}" => $request->get('data')
	];

	$v = Validator::make($data, config('richard.rules'));

	return json_encode( $v->errors()->first( $field ) );
	
});
