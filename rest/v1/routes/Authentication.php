<?php 

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



?>