<?php

namespace RichardKeep\Validate\CustomValidations;

use Illuminate\Validation\Validator;

class ValidationExtended extends Validator {

	public function __construct($translator, $data, $rules, $messages = array(), $customAttributes = array())
	{
		parent::__construct($translator, $data, $rules, $messages, $customAttributes);

		$this->setCustomMessages([
			'foo'=>'Please enter a valid Foo.',
		]);
	}

	protected function validateFoo($attribute, $value)
	{
		return (bool)preg_match("/Foo/i", $value);			
	}
}
