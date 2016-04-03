<?php
// ini_set("display_errors", 1);
require 'vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use API\Lib\QPMerchant;
use API\Lib\QPUser;

$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);

$app->get('/api/v1/merchants/signin', function (Request $request, Response $response) {

	$data = array(
		'email' => 'ardyanto.hermawan@gmail.com',
		'password' => 'wawan'
	);

	$merchant = new QPMerchant($data);
	var_dump($merchant->signIn());
});

$app->get('/api/v1/merchants/signup', function (Request $request, Response $response) {

	$data = array(
		'username' => 'ardyantohermawan',
		'firstname' => 'Ardyanto',
		'lastname' => 'Hermawan',
		'email' => 'ardyanto.hermawan@gmail.com',
		'password' => 'wawan'
	);

	$merchant = new QPMerchant($data);
	var_dump($merchant->signUp());
});

$app->get('/api/v1/merchants/{id}', function (Request $request, Response $response) {

	$data = array('userID' => $request->getAttribute('id'));
	$merchant = new QPMerchant($data);
	var_dump($merchant->retrieve());

});

$app->get('/api/v1/merchants/update/{id}', function (Request $request, Response $response) {

	$data = array(
		'userID' => $request->getAttribute('id'),
		'username' => 'ardyantohermawan',
		'firstname' => 'Ardyanto',
		'lastname' => 'Hermawan',
		'email' => 'ardyanto.hermawan@gmail.com'
	);

	$merchant = new QPMerchant($data);
	var_dump($merchant->signUp());
});

$app->run();


?>