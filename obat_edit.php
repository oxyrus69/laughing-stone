<?php
	session_start();
	if(isset($_POST['edit'])){
		$users = simplexml_load_file('files/medicines.xml');
		foreach($users->medicine as $user){
			if($user->id == $_POST['id']){
				$user->nama = $_POST['nama'];
				$user->stok = $_POST['stok'];
				$user->harga = $_POST['harga'];
				break;
			}
		}
		file_put_contents('files/medicines.xml', $users->asXML());
		$_SESSION['message'] = 'Medicine updated successfully';
		header('location: obatpage.php');
	}
	else{
		$_SESSION['message'] = 'Select medicine to edit first';
		header('location: obatpage.php');
	}

?>