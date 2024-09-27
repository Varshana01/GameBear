<?php
session_start();

// When payment is canceled, just show a cancel message
echo "<h1>Payment Canceled</h1>";
echo "<p>Your payment has been canceled. You can go back to the store and try again.</p>";

// Link to return to the store
echo '<a href="store.php">Return to Store</a>';
?>
