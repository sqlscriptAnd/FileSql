<?php
class DB_CONNECT{
	
	 // constructor
    function __construct() {
        // connecting to database
        $this->connect();
    }
 
    // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }
	
	function connect(){
		
		// import database connection variables
		require_once 'configDB.php';
		// Connecting to mysql database
		$con = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die(mysql_error());
		mysql_select_db(DB_DATABASE);
		// returing connection cursor
        return $con;
	}
	
	function close() {
        // closing db connection
        mysql_close();
    }
}

?>