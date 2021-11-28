<?php
class databaseConnection{
	public function __construct(){
		global $conn;
		$conn = new mysqli("epiz_30460933_uni", "epiz_30460933", "VDE5vBxN6DrI" , "sql210.epizy.com");
		//check error 
		if(!$conn){
			die("Database cannot established connection properly: " . $conn->connect_error());
		}

	}
}

?>
