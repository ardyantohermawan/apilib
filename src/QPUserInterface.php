<?php
namespace API\Lib;

interface QPUserInterface {

	public function signUp();

	public function signIn();

	public function retrieve($userID);
	
	public function update($userID);

	public function delete($userID);
}

?>