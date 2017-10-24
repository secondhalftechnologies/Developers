<?php 
	
	/**
	 *  Add new Farmer to the data base with Post method
	 *  The following post method will create a farmer row in data base and will return created farmer id
	 */
	$app->post('/farmers', 'authenticate', function() use ($app){
		verifyRequiredParams([ 'tbl_name', 'tbl_aadhaar', 'tbl_gender']); //provide a list of required parametes
		$response = [];
		$farmer_data = $app->request->post(); //fetching the post data into variable
		
		// ------------------------
		// Do Validation here
		// ------------------------

		$db = new DbHandler();
		// creating new farmer
		$farmer_id = 23; //$db->createFarmer($farmer_data);
		if ($farmer_id != NULL) {
			$response["success"] = true;
			$response["message"] = "Farmer created successfully";
			$response["farmer_id"] = $farmer_id;
		} else {
			$response["success"] = false;
			$response["message"] = "Failed to Add Farmer. Please try again";
		}
		echoResponse(201, $response);
	});


	/**
	 * Get one or All farmers
	 * It is just an example you will have to get the current agent_id then list his farmer list
	 * 'authenticate' parameter is a function in Utils.php file where we are checking authorization 
	 */
	$app->get('/farmers(/:id)', 'authenticate', function($id = null) use ($app) {

		$response = [];


		if (isset($id)) {

			//will have to fetch data from database
			//eg. select * from farmes where farmer_id = [id]
			$farmers = [
				['id' => '1', 'image' => 'images.jpg', 'name' => 'Ejaz Ansari', 'address' => '203 isa heights, Molvi compound, Reti bandar rd. kalyan west', 'points' => '20.50' ],
			];

		}
		else{
			
			//will have to fetch data from database
			//eg. select * from farmes
			$farmers = [
				['id' => '1', 'image' => 'images.jpg', 'name' => 'Ejaz Ansari', 'address' => '203 isa heights, Molvi compound, Reti bandar rd. kalyan west', 'points' => '20.50' ],
				['id' => '2', 'image' => 'images.jpg', 'name' => 'Prathamesh Acharekar', 'address' => 'heights, Molvi compound, Reti bandar rd. kalyan west', 'points' => '2.90' ],
				['id' => '3', 'image' => 'images.jpg', 'name' => 'Punit Panchal', 'address' => 'Molvi compound, Reti bandar rd. kalyan west', 'points' => '30.87' ],
				['id' => '4', 'image' => 'images.jpg', 'name' => 'Satish Dhere', 'address' => '06 isa heights, Molvi compound, Reti bandar rd. kalyan west', 'points' => '40.33' ],
				['id' => '4', 'image' => 'images.jpg', 'name' => 'Satish Dhere', 'address' => '06 isa heights, Molvi compound, Reti bandar rd. kalyan west', 'points' => '40.33' ],
				['id' => '4', 'image' => 'images.jpg', 'name' => 'Satish Dhere', 'address' => '06 isa heights, Molvi compound, Reti bandar rd. kalyan west', 'points' => '40.33' ],
				['id' => '4', 'image' => 'images.jpg', 'name' => 'Satish Dhere', 'address' => '06 isa heights, Molvi compound, Reti bandar rd. kalyan west', 'points' => '40.33' ],
				['id' => '4', 'image' => 'images.jpg', 'name' => 'Satish Dhere', 'address' => '06 isa heights, Molvi compound, Reti bandar rd. kalyan west', 'points' => '40.33' ],
				['id' => '4', 'image' => 'images.jpg', 'name' => 'Satish Dhere', 'address' => '06 isa heights, Molvi compound, Reti bandar rd. kalyan west', 'points' => '40.33' ],
				['id' => '4', 'image' => 'images.jpg', 'name' => 'Satish Dhere', 'address' => '06 isa heights, Molvi compound, Reti bandar rd. kalyan west', 'points' => '40.33' ],
				['id' => '4', 'image' => 'images.jpg', 'name' => 'Satish Dhere', 'address' => '06 isa heights, Molvi compound, Reti bandar rd. kalyan west', 'points' => '40.33' ],
				['id' => '4', 'image' => 'images.jpg', 'name' => 'Satish Dhere', 'address' => '06 isa heights, Molvi compound, Reti bandar rd. kalyan west', 'points' => '40.33' ],
				['id' => '4', 'image' => 'images.jpg', 'name' => 'Satish Dhere', 'address' => '06 isa heights, Molvi compound, Reti bandar rd. kalyan west', 'points' => '40.33' ],
			];
		}

		$response["success"] = true;
		$response["data"] = $farmers;

		echoResponse(200, $response);
	});


 ?>