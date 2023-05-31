<?php
	session_start();
	if(isset($_POST['add'])){
		//open xml file
		$users = simplexml_load_file('files/medicines.xml');
		$user = $users->addChild('medicine');
		$user->addChild('id', $_POST['id']);
		$user->addChild('nama', $_POST['nama']);
		$user->addChild('stok', $_POST['stok']);
		$user->addChild('harga', $_POST['harga']);
		// Save to file
		// file_put_contents('files/members.xml', $users->asXML());
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($users->asXML());
		$dom->save('files/medicines.xml');
		// Prettify / Format XML and save

		$_SESSION['message'] = 'Medicine added successfully';
		header('location: obatpage.php');
	}
	else{
		$_SESSION['message'] = 'Fill up add form first';
		header('location: obatpage.php');
	}

?>