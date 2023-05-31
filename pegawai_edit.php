<?php
	session_start();
	if(isset($_POST['edit'])){
		$users = simplexml_load_file('files/employees.xml');
		foreach($users->user as $user){
			if($user->id == $_POST['id']){
				$user->firstname = $_POST['firstname'];
				$user->lastname = $_POST['lastname'];
				$user->address = $_POST['address'];
				$user->profesi = $_POST['profesi'];
				break;
			}
		}
		file_put_contents('files/employees.xml', $users->asXML());
		$_SESSION['message'] = 'Employees updated successfully';
		header('location: pegawaipage.php');
	}
	else{
		$_SESSION['message'] = 'Select employee to edit first';
		header('location: pegawaipage.php');
	}

?>