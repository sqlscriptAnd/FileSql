<?php
$response = array();
require_once 'connectDB.php';
// connecting to db
$db = new DB_CONNECT();
 
$result = mysql_query("SELECT * FROM ADMIN WHERE admid = '$user_id'");
	 
if (mysql_num_rows($result) > 0){
	$response["member"] = array();
	
	 while ($row = mysql_fetch_array($result)) {
        // temp user array
        $member = array();
		$member["userId"] = $result["admid"];
		$member["pwd"] = $result["pwd"];
		$member["fname"] = $result["fname"];
		$member["lname"] = $result["lname"];           
		$member["position"] = $result["position"];
 
        // push single product into final response array
        array_push($response["member"], $member);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
}
 else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>