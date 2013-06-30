<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	public static $rules = array(
	        'real_name' => 'Required|Min:3|Max:80|Alpha',
	        'email'     => 'Required|Between:3,64|Email|Unique:users',
	        'password'  =>'Required|AlphaNum|Between:4,8|Confirmed',
	        'password_confirmation'=>'Required|AlphaNum|Between:4,8'
		);

	public $timestamps = false;
	
/* 	public static function validate($input) {
		$rules = array(
	        'real_name' => 'Required|Min:3|Max:80|Alpha',
	        'email'     => 'Required|Between:3,64|Email|Unique:users',
	        'password'  =>'Required|AlphaNum|Between:4,8|Confirmed',
	        'password_confirmation'=>'Required|AlphaNum|Between:4,8'
		);
	
		return Validator::make($input, $rules);
	} */
	
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Fillable fields array
	 *
	 * @var array
	 */
	protected $fillable = array('real_name', 'email', 'password');
	
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
	
	public function obslogs()
	{
	    return $this->has_many('Obslog');
	}
	
	public function techlogs()
	{
	    return $this->has_many('Techlog');
	}

}