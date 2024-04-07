<?php
	session_start();
	if(isset($_POST['add'])){
		//open xml file
		$users = simplexml_load_file('productStock.xml');
		$user = $users->addChild('user');
		$user->addChild('prodId', $_POST['prodId']);
		$user->addChild('prodName', $_POST['prodName']);
		$user->addChild('Price', $_POST['Price']);
		$user->addChild('Quantity', $_POST['Quantity']);
		// Save to file
		// file_put_contents('files/members.xml', $users->asXML());
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($users->asXML());
		$dom->save('productStock.xml');
		// Prettify / Format XML and save
 
		$_SESSION['message'] = 'Product added successfully';
		header('location: product.php');
	}
	else{
		$_SESSION['message'] = 'Fill up add form first';
		header('location: product.php');
	}
?>