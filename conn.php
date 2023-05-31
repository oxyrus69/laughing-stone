<?php
	$conn = new mysqli('localhost', 'root', '', 'db_xml');
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>