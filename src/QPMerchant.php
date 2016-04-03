<?php
namespace API\Lib;

use API\Lib\QPUser;
use API\Lib\QPUserInterface;
use API\Lib\QPDatabase;
use API\Lib\Exception;
use API\Lib\QPException;
use API\Lib\QPHttpResponse;

class QPMerchant extends QPUser implements QPUserInterface
{

	function __construct($data)
	{
		parent::__construct($data);
	}

	public function signIn()
	{
		try {

			$db = new QPDatabase();
			$dbCon = $db->connect();
			$data = $dbCon::table('users')
						->select(array('userID', 'username', 'email', 'firstName', 'lastName'))
						->where('userType', '=', 'merchant')
						->where('email', '=', parent::getEmail())
						->where('password', '=', parent::getPassword())
						->first();

			var_dump($data);

			exit();


			$response = new QPHttpResponse(201, 'FOUND', $data);
			return $response->toJSON();

		} catch (Exception $e) {
			throw new QPException($e->getMessage(), $e->getCode);
		}
	}

	public function signUp()
	{
		parent::setRole('merchant');
		parent::setConfirmed(0);
		parent::setActive(1);

		$data = array(
				'userID' => parent::generateUserID(),
				'username' => parent::getUsername(),
				'email' => parent::getEmail(),
				'password' => parent::getPassword(),
				'firstName' => parent::getFirstName(),
				'lastName' => parent::getLastName(),
				'userType' => parent::getRole(),
				'active' => parent::getActive(),
			);

		try {

			$db = new QPDatabase();
			$dbCon = $db->connect();

			$result = $dbCon::table('users')->insert($data);
			unset($data['password'], $data['active'], $data['userType']);

			$response = new QPHttpResponse(201, 'CREATED', $data);
			return $response->toJSON();
			
		} catch (Exception $e) {
			throw new QPException($e->getMessage(), $e->getCode);
		}

	}

	public function retrieve($userID)
	{
		$db = new QPDatabase();
		$dbCon = $db->connect();

		try {

			$data = $dbCon::table('users')
						->select(array('userID', 'username', 'email', 'firstName', 'lastName'))
						->where('userID', '=', $userID)
						->get();

			$response = new QPHttpResponse(200, 'FOUND', $data);
			return $response->toJSON(); 
			
		} catch (Exception $e) {
			throw new QPException($e->getMessage(), $e->getCode);
		}

	
	}

	public function update($userID)
	{
		$data = array(
				'username' => parent::getUsername(),
				'email' => parent::getEmail(),
				'password' => parent::getPassword(),
				'firstName' => parent::getFirstName(),
				'lastName' => parent::getLastName(),
				'userType' => parent::getRole(),
				'active' => parent::getActive(),
			);

		try {

			$db = new QPDatabase();
			$dbCon = $db->connect();

			$result = $dbCon::table('users')->where('userID', '=', $userID)->update($data);

			$response = new QPHttpResponse(200, 'MODIFIED', array());
			return $response->toJSON();
			
		} catch (Exception $e) {
			throw new QPException($e->getMessage(), $e->getCode);
		}
	}

	public function delete($userID)
	{
		try {

			$db = new QPDatabase();
			$dbCon = $db->connect();

			$result = $dbCon::table('users')->where('userID', '=', $userID)->delete();

			$response = new QPHttpResponse(200, 'DELETED', array());
			return $response->toJSON();
			
		} catch (Exception $e) {
			throw new QPException($e->getMessage(), $e->getCode);
		}
	}

}

?>