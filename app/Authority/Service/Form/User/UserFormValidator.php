<?php namespace Authority\Service\Form\User;

use Authority\Service\Validation\AbstractValidator;

class UserFormValidator extends AbstractValidator {
	
	/**
	 * Validation rules
	 *
	 * @var Array 
	 */
	protected $rules = [
		'name'    => 'required',
		'gender'  => 'required',
		'company' => 'required',
		'email'   => 'required|email',
		'phone'   => 'required|numeric',
		'address' => 'required'
	];

	/**
	 * Custom Validation Messages
	 *
	 * @var Array 
	 */
	protected $messages = [
		//'email.required' => 'An email address is required.'
	];
	
}