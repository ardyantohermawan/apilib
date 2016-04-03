<?php
namespace API\Lib;

use API\Lib\QPUtils;
use API\Lib\QPException;

class QPUser
{
	protected $userID;
	protected $username;
	protected $firstname;
	protected $lastname;
	protected $email;
	protected $password;
	protected $confirmed;
	protected $active;
	protected $role;

	function __construct($data=array()) {
			
		try {

			if (isset($data)) {
				foreach ($data as $key => $value) {
					$this->$key = $value;
				}
			}
			
		} catch (Exception $e) {
			
			throw new QPException($e->getMessage(), $e->getCode);
		}

	}

	public function setUsername($username='')
	{
		$this->username = $username;
	}

	public function setUserID($userID='')
	{
		$this->userID = $userID;
	}

	public function setFirstName($firstname='')
	{
		$this->firstname = $firstname;
	}

	public function setLastName($lastname='')
	{
		$this->lastname = $lastname;
	}

	public function setEmail($email='')
	{
		$this->email = $email;
	}

	public function setPassword($password='')
	{
		$this->password = $password;
	}

	public function setRole($role='')
	{
		$this->role = $role;
	}

	public function setConfirmed($confirmed=1)
	{
		$this->confirmed = $confirmed;
	}

	public function setActive($active=1)
	{
		$this->active = $active;
	}

	public function generateUserID()
	{
		$utils = new QPUtils();
		$this->userID = $utils->setObjectID();
		return $this->userID;
	}

	public function getUserID()
	{
		return $this->userID;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function getFirstName()
	{
		return $this->firstname;
	}

	public function getLastName()
	{
		return $this->lastname;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return sha1($this->password);
	}

	public function getConfirmed()
	{
		return $this->confirmed;
	}

	public function getActive()
	{
		return $this->active;
	}

	public function getRole()
	{
		return $this->role;
	}

}

?>