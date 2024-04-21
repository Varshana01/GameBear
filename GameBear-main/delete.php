<?php
	session_start();
	$id = $_GET['prodId'];
 
	$products = simplexml_load_file('productStock.xml');
 
	//create iterator to assign to each user
	$index = 0;
	$i = 0;
 
	foreach($products->product as $product){
		if($product->prodId == $id){
			$index = $i;
			break;
		}
		$i++;
	}
 
	unset($products->product[$index]);
	file_put_contents('productStock.xml', $products->asXML());
 
	$_SESSION['message'] = 'Product deleted successfully';
	header('location: product.php');
 
?>