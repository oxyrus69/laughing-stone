<?php
	session_start();
	$id = $_GET['id'];

	$users = simplexml_load_file('files/employees.xml');

	//we're are going to create iterator to assign to each user
	$index = 0;
	$i = 0;

	foreach($users->user as $user){
		if($user->id == $id){
			$index = $i;
			break;
		}
		$i++;
	}

	unset($users->user[$index]);
	file_put_contents('files/employees.xml', $users->asXML());

	$_SESSION['message'] = 'Employee deleted successfully';
	header('location: pegawaipage.php');

?>