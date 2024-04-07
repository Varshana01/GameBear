<?php
	session_start();
	$id = $_GET['prodId'];
 
	$users = simplexml_load_file('productStock.xml');
 
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
	file_put_contents('productStock.xml', $users->asXML());
 
	$_SESSION['message'] = 'Product deleted successfully';
	header('location: product.php');
 
?>