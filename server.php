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
  $request = explode("/", substr(@$_SERVER['ORIG_PATH_INFO'], 1));
  
  
  switch ($method) {
    case 'PUT':
      //do_something_with_put($request);  
      break;
    case 'POST':
      //do_something_with_post($request);  
      break;
    case 'GET':
		// Reminder: $request includes our original URL
		$response=array
			(
				'method' => 'Rest API GET',
				'object_type' => $result[0],
				'object_id' => $result[1]
			)
		
		http_response_code(200);
		echo json_encode($response);				
      break;
    default:
      //handle_error($request);  
      break;
  }
  
  
  
  // Function search
/*  if(!empty($_GET['search'])) {
    $key = array_search($_GET['search'], array_column($data, 'name'),true);
    $id = $data[$key]['id'];
    $name = $data[$key]['name'];
    $result = array(
      'id' => $id,
      'name' => $name,
      'status' => 'success'
    );
  } else {
    foreach($data as $d) {
      $result['city'][] = array(
        'id' => $d['id'],
        'name' => $d['name'],
      );
    }
    $result['status'][] = 'success';
  } */
   
?>