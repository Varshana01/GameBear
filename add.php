<?php
	session_start();
	if(isset($_POST['add'])){
		//open xml file
		$products = simplexml_load_file('productStock.xml');
		$product = $products->addChild('product');
		$product->addChild('prodId', $_POST['prodId']);
		$product->addChild('prodName', $_POST['prodName']);
		$product->addChild('Price', $_POST['Price']);
		$product->addChild('Quantity', $_POST['Quantity']);
		// Save to file
		// Prettify / Format XML and save
		$dom = new DomDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($products->asXML());
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