<?php
	session_start();
	if(isset($_POST['add'])){
		//open xml file
		$users = simplexml_load_file('files/employees.xml');
		$user = $users->addChild('user');
		$user->addChild('id', $_POST['id']);
		$user->addChild('firstname', $_POST['firstname']);
		$user->addChild('lastname', $_POST['lastname']);
		$user->addChild('address', $_POST['address']);
		$user->addChild('profesi', $_POST['profesi']);
		// Save to file
		// file_put_contents('files/members.xml', $users->asXML());
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($users->asXML());
		$dom->save('files/employees.xml');
		// Prettify / Format XML and save

		$_SESSION['message'] = 'Employee added successfully';
		header('location: pegawaipage.php');
	}
	else{
		$_SESSION['message'] = 'Fill up add form first';
		header('location: pegawaipage.php');
	}

?>