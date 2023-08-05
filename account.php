<?php 
  //Outpout the common HTTP Header fields for the JSON response
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");    // limit options to GET, POST, PUT,DELETE
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  
  // Which HTTP method was called? Options are: GET, POST, PUT, DELETE
  $method = $_SERVER['REQUEST_METHOD'];
  
 
  // Which URL was requested? This allows us to parse a URL like domain.com/php-rest-api-server/Object/ObjectID  
  $path = substr(@$_SERVER['ORIG_PATH_INFO'], 1);
  $request = explode("/", $path);
  
   
  if ('POST'===$method)
  {
	  // Create new account from the details passed in the POST call
	  $newAccountID = rand(500,100000);
	  
	  
	  $newAccount = array(
		  'id' => $newAccountID,
		  'name' => $_POST['name'],
		  'street_address' => $_POST['street_address'],
		  'city' => $_POST['city'],
		  'state' => $_POST['state'],
		  'country' => $_POST['country'],
		  'zipcode' => $_POST['zipcode'],
		  'email' => $_POST['email'],
		  'phone' => $_POST['phone']
	  	);
	  
	  
  	  	$response=array
			(
			'method' => 'POST to '.$_SERVER['REQUEST_URI'],
			'result' => 'Successfully created New Account '.$newAccountID,
			'newAccount' => $newAccount
			);
	
			
		http_response_code(200);
		echo json_encode($response); 
  }

  if ('GET'===$method)
  {
			$object_id=$request[0];
			
			if ((strlen($object_id)==0)||(is_numeric($object_id)==FALSE))
			{
				// Return ALL Account objects
				$response=array
				(
					'method' => 'GET to '.$_SERVER['REQUEST_URI'],
					'result' => 'Successfully retrieved All Accounts',
					'NumOfObjects' => '5'
				);
				
				http_response_code(200);
				echo json_encode($response);
			}
			else // we know our object ID is numeric and isn't empty
			{
				// Return the one Account with Object ID
				$response=array
				(
					'method' => 'GET to '.$_SERVER['REQUEST_URI'],
					'result' => 'Successfully retrieved Specific Account '.$object_id,
					'account' => array (
										'id' => $object_id,
										'name' => 'John Smith',
										'street_address' => '123 Main Street',
										'city' => 'San Francisco',
										'state' => 'CA',
										'country' => 'USA',
										'zipcode' => '94103',
										'email' => 'john@smith.com',
										'phone' => '+1 415-123-4567'
								)
				);
				
				http_response_code(200);
				echo json_encode($response);
			}
  }
  if ('PUT'===$method)
	  { 
    	  	$response=array
  			(
			'method' => 'PUT to '.$_SERVER['REQUEST_URI'],
  			'result' => 'PUT functionality not yet implemented'
			);
	
			// Handle account update
	
  		http_response_code(200);
  		echo json_encode($response); 
	  
	  }
  if ('DELETE'===$method)
	  { 
  	  	$response=array
			(
			'method' => 'DELETE to '.$_SERVER['REQUEST_URI'],
			'result' => 'DELETE functionality not yet implemented'
			);
	  
	 	// Handle account delete
	 	 
	  	http_response_code(200);
	  	echo json_encode($response); 
	  
	  }
?>