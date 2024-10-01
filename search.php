<?php
header('Content-Type: application/json');

// Load products from XML
$xml = simplexml_load_file('store.xml');
$products = [];

// Collect products into an array
foreach ($xml->product as $product) {
    $products[] = [
        "img" => (string)$product->img['src'],
        "prodId" => (string)$product->prodId,
        "price" => (float)$product->price,
        "name" => (string)$product->name,
        "buttonNo" => (int)$product->buttonNo
    ];
}

// Get the search query from the request
$searchQuery = isset($_GET['query']) ? strtolower(trim($_GET['query'])) : '';

// Filter products based on the search query
$filteredProducts = array_filter($products, function ($product) use ($searchQuery) {
    return strpos(strtolower($product['name']), $searchQuery) === 0;  // Change to check if the name starts with the query
});

// Return the filtered products as JSON
echo json_encode(array_values($filteredProducts));

