<?php

use Laravel\Cashier\BillableInterface;
use Laravel\Cashier\BillableTrait;
use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface, BillableInterface {

	use BillableTrait;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $fillable = ['email','password'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}