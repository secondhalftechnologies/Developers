<?php

require_once '../include/DbHandler.php';
require_once '../include/Utils.php';
require '../vendor/autoload.php';

$app = new \Slim\Slim();
if(SLIM_DEBUG){
  $app->config('debug',true);
}


/**
* route test block
*/
$app->get('/', function () {
    echo "restfull api v1";
});
$app->get('/test/:name', function ($name) {
    echo "Hello, $name";
});


/**
* User Login
* url - /login
* method - POST
* params - username, password
*/
$app->post('/login', function() use ($app) {
	verifyRequiredParams(array('username', 'password'));
	// reading post params
	$username = $app->request()->post('username');
	$password = $app->request()->post('password');
	$response = array();
	$db = new DbHandler();
	// check for correct username and password
	if ($db->checkLogin($username, $password)) {
		// get the user by username
		$user = $db->getUserByUsername($username);
		if ($user != NULL) {
			$response["success"] = true;
			$response["data"] = $user;
		} else {
			// unknown error occurred
			$response['success'] = false;
			$response['data'] = [ "message" => "An error occurred. Please try again" ];
		}
	} else {
		// user credentials are wrong
		$response['success'] = false;
		$response['data'] = [ "message" => "Login failed. Incorrect credentials" ];
	}
	echoResponse(200, $response);
});



// Run Slim
$app->run();