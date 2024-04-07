<?php
	session_start();
	if(isset($_POST['edit'])){
		$users = simplexml_load_file('productStock.xml');
		foreach($users->user as $user){
			if($user->prodId == $_POST['prodId']){
				$user->prodName = $_POST['prodName'];
				$user->Price = $_POST['Price'];
				$user->Quantity = $_POST['Quantity'];
				break;
			}
		}
		file_put_contents('productStock.xml', $users->asXML());
		$_SESSION['message'] = 'Product updated successfully';
		header('location: product.php');
	}
	else{
		$_SESSION['message'] = 'Select product to edit first';
		header('location: product.php');
	}

?>