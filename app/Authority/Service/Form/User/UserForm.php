<?php namespace Authority\Service\Form\User;

use Authority\Service\Validation\ValidableInterface;
use Authority\Repository\User\UserInterface;

class UserForm {

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

	/**
	 * Instantiate Construct
	 *
	 * @return this
	 */
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
    public function save(array $input)
    {
        if(!$this->valid($input))
        {
            return false;
        }

        return $this->user->store($input);
    }
	
	/**
     * Update a user
     *
     * @return integer
     */
    public function update(array $input)
    {
        if(!$this->valid($input))
        {
            return false;
        }

        return $this->user->update($input);
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