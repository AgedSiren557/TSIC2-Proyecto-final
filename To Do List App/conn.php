<?php
	$conn = new mysqli("<IP del servicio de mysql>:3306", "root", "password", "db_task");
	
	if(!$conn){
		die("Error: Cannot connect to the database");
	}
?>
