<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['productId'];
    $username = $_POST['username'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Load the existing reviews from XML
    $xml = simplexml_load_file("reviews.xml");

    // Create a new review element
    $review = $xml->addChild('product');
    $review->addAttribute('id', $productId);
    $review = $review->addChild('review');
    $review->addChild('username', $username);
    $review->addChild('rating', $rating);
    $review->addChild('comment', $comment);

    // Save the updated XML file
    $xml->asXML("reviews.xml");

    echo json_encode(['status' => 'success', 'message' => 'Review added successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
