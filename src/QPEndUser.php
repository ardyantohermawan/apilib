<?php
namespace API\Lib\User;

use API\Lib\User\QPUser;
use API\Lib\User\QPUserInterface;

class QPEndUser extends QPUser implements QPUserInterface
{
	
	private $role;

	function __construct($fullname, $email, $password)
	{
		parent::__construct($fullname, $email, $password);	
		$this->role = 'enduser';
	}

	public function getRole()
	{
		return $this->role;
	}

}

?>