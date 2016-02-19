<?php
$response = array();
require_once 'connectDB.php';
// connecting to db
$db = new DB_CONNECT();
if (isset($_GET["admid"])){
	 $user_id = $_GET['admid'];	 
	 $result = mysql_query("SELECT * FROM ADMIN WHERE admid = '$user_id'");
	 
	  if (!empty($result)) {
		   // check for empty result
        if (mysql_num_rows($result) > 0){
			 $result = mysql_fetch_array($result);
 
            $member = array();
            $member["userId"] = $result["admid"];
			$member["pwd"] = $result["pwd"];
            $member["fname"] = $result["fname"];
            $member["lname"] = $result["lname"];           
            $member["position"] = $result["position"];
            // success
            $response["success"] = 1;
 
            // user node
            $response["member"] = array();
 
            array_push($response["member"], $member);
 
            // echoing JSON response
            echo json_encode($response);
		}
		else {
            // no product found
            $response["success"] = 0;
            $response["message"] = "No product found";
 
            // echo no users JSON
            echo json_encode($response);
        }  	 
	  }
	  else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "No product found";
 
        // echo no users JSON
        echo json_encode($response);
    }
	 
}
else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>