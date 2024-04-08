<?php
	session_start();
	if(isset($_POST['edit'])){
		$products = simplexml_load_file('productStock.xml');
		foreach($products->product as $product){
			if($product->prodId == $_POST['prodId']){
				$product->prodName = $_POST['prodName'];
				$product->Price = $_POST['Price'];
				$product->Quantity = $_POST['Quantity'];
				break;
			}
		}
		file_put_contents('productStock.xml', $products->asXML());
		$_SESSION['message'] = 'Product updated successfully';
		header('location: product.php');
	}
	else{
		$_SESSION['message'] = 'Select product to edit first';
		header('location: product.php');
	}

?>