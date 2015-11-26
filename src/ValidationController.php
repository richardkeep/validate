<?php namespace RichardKeep\Validate;

use Validator;
use Illuminate\Http\Request;

class ValidationController
{
        // Validate a POST request
        
        public function validate(Request $request)
        {

	        $field = preg_replace('/-/', '_', $request->get('field'));
	
        	$data = [
        		"{$field}" => $request->get('data')
        	];

        	$v = Validator::make($data, config('richard.rules'));
        
        	return json_encode( $v->errors()->first( $field ) );  
        }
}
