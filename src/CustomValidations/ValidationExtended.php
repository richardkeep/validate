<?php

namespace RichardKeep\Validate\CustomValidations;

use Illuminate\Validation\Validator;

class ValidationExtended extends Validator {

	public function __construct($translator, $data, $rules, $messages = array(), $customAttributes = array())
	{
		parent::__construct($translator, $data, $rules, $messages, $customAttributes);

		$this->setCustomMessages([
			'bf_no'=>'Please enter a valid BF Number.',
			'yor'=>'The year of registration should be a valid year/month e.g 2009/3',
			'address'=>'The :attribute should be a valid postal address e.g 29263 - 00100',
			'cap'=>'The :attribute should be a valid CAP Link e.g http://www.beforward.jp/customer/cap?t=9acb190cbfa04474bfee0f87ccbeb61d',
		]);
	}

	protected function validateBfNo($attribute, $value)
	{
		return (bool)preg_match("/^BF[4-9][0-9]{5}$/i", $value);			
	}

	protected function validateYor($attribute, $value)
	{
		return (bool)preg_match("/^[1-2][0,9][0-9]{2}\/[0-9]{1,2}$/", $value);			
	}

	protected function validateAddress($attribute, $value)
	{
		return (bool)preg_match("/^[1-9][0-9]{1,}\s-\s[0-9]{5}$/", $value);
	}

	protected function validateCap($attribute, $value)
	{
		return (bool)preg_match("/^http:\/\/www.beforward.jp\/customer\/cap\?t=[a-z0-9]{32}$/i", $value);
	}
}
