<?php namespace Authority\Service\Form\Login;

use Authority\Service\Validation\AbstractValidator;

class LoginFormValidator extends AbstractValidator {
	
	/**
	 * Validation rules
	 *
	 * @var Array 
	 */
	protected $rules = array(
		'email'    => 'required|min:4|max:32|email',
		'password' => 'required|min:6'
	);

	/**
	 * Custom Validation Messages
	 *
	 * @var Array 
	 */
	protected $messages = array(
		//'email.required' => 'An email address is required.'
	);
	
}