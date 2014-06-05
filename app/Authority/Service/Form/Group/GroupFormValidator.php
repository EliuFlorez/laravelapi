<?php namespace Authority\Service\Form\Group;

use Authority\Service\Validation\AbstractValidator;

class GroupFormValidator extends AbstractValidator {
	
	/**
	 * Validation rules
	 *
	 * @var Array 
	 */
	protected $rules = array(
		'name' => 'required|min:4'
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