<?php 
	//connect to database
    $conn = new mysqli("localhost", "root" ,"" ,"popthycorn");
	
	//check if has connection
	if($conn->connect_error){
		die("Connection Failed: ".$conn->connect_error);
	}
?>