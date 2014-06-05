<?php namespace Authority\Service\Form\ResendActivation;

use Authority\Service\Validation\ValidableInterface;
use Authority\Repository\User\UserInterface;

class ResendActivationForm {

	/**
	 * Form Data
	 *
	 * @var array
	 */
	protected $data;

	/**
	 * Validator
	 *
	 * @var \Authority\Service\Form\ValidableInterface 
	 */
	protected $validator;

	/**
	 * Session Repository
	 *
	 * @var \Authority\Repository\Session\SessionInterface 
	 */
	protected $user;

	public function __construct(ValidableInterface $validator, UserInterface $user)
	{
		$this->validator = $validator;
		$this->user = $user;
	}

	/**
     * Create a new user
     *
     * @return integer
     */
    public function resend(array $input)
    {
        if(!$this->valid($input))
        {
            return false;
        }

        return $this->user->resend($input);
    }

	/**
	 * Return any validation errors
	 *
	 * @return array 
	 */
	public function errors()
	{
		return $this->validator->errors();
	}

	/**
	 * Test if form validator passes
	 *
	 * @return boolean 
	 */
	protected function valid(array $input)
	{
		return $this->validator->with($input)->passes();		
	}

}