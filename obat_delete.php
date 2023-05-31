<?php
	session_start();
	$id = $_GET['id'];

	$users = simplexml_load_file('files/medicines.xml');

	//we're are going to create iterator to assign to each user
	$index = 0;
	$i = 0;

	foreach($users->medicine as $user){
		if($user->id == $id){
			$index = $i;
			break;
		}
		$i++;
	}

	unset($users->medicine[$index]);
	file_put_contents('files/medicines.xml', $users->asXML());

	$_SESSION['message'] = 'Medicine deleted successfully';
	header('location: obatpage.php');

?>