<?php
	require 'conn.php';
	$xml = new DomDocument("1.0", "UTF-8");
	
	$person = $xml->createElement("members");
	$person = $xml->appendChild($members);
	
	$query = $conn->query("SELECT * FROM `member`") or die(mysqli_error());
	
	while($fetch = $query->fetch_array()){
		
		$member = $xml->createElement("member");
		$member = $person->appendChild($member);
			
		$firstname = $xml->createElement("firstname", $fetch['firstname']);
		$firstname = $member->appendChild($firstname);
			
		$lastname = $xml->createElement("lastname", $fetch['lastname']);
		$lastname = $member->appendChild($lastname);
		
		$address = $xml->createElement("address", $fetch['address']);
		$address = $member->appendChild($address);
		
	}

	$xml->FormatOutput = true;
	$string_value = $xml->saveXML();
	$xml->save("member.xml");
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://sourcecodester.com">Sourcecodester</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Generate XML File</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<center><h4>XML File has Been Generated</h4></center>
		<center><a href="member.xml">Click here to open the file</a></center>
		<a href="client_index.php">Back</a>
</body>

</html>
