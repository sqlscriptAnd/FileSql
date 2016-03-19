<?php
$response = array();
require_once 'connectDB.php';
// connecting to db
$db = new DB_CONNECT();

$result = mysql_query("SELECT * FROM ADMIN") or die(mysql_error());
	 
if (mysql_num_rows($result) > 0){
	$response["member"] = array();
	
	 while ($row = mysql_fetch_array($result)) {
        // temp user array
        $member = array();
		$member["userId"] = $row["ADMID"];
		$member["username"] = $row["USERNAME"];
		$member["pwd"] = $row["PWD"];
		$member["fname"] = $row["FNAME"];
		$member["lname"] = $row["LNAME"];           
		$member["position"] = $row["POSITION"];
 
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
    $response["message"] = "Data No found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>