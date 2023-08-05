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
  	  	$response=array
			(
			'method' => 'POST - Create New Account',
			'version' => '1.0'
			);
	
		http_response_code(200);
		echo json_encode($response); 
  }

  if ('GET'===$method)
  {
			$object_id=$request[0];
			
			if (strlen($object_id)==0)
			{
				// Return ALL Account objects
				$response=array
				(
					'Method' => 'GET - Retrieve All Accounts',
					'NumOfObjects' => '5'
				);
				
				http_response_code(200);
				echo json_encode($response);
			}
			else
			{
				// Return the one Account with Object ID
				$response=array
				(
					'Method' => 'GET - Retrieve Specific Account '.$object_id,
					'Account' => array (
										'id' => '1234',
										'name' => 'John Smith',
										'street_address' => '123 Main Street',
										'city' => 'Fairfax',
										'state' => 'CA',
										'country' => 'USA',
										'zipcode' => '94960',
										'email' => 'john@smith.com',
										'phone' => '+1 555-555-1234'
								)
				);
				
				http_response_code(200);
				echo json_encode($response);
			}
  }
  if ('PUT'===$method)
	  { }
  if ('DELETE'===$method)
	  { }
?>