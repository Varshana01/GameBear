<?php
require_once("nusoap.php"); // Load nusoap library

// Create a new SOAP client
$client = new nusoap_client("http://yourdomain.com/paymentGatewayServer.php?wsdl", true);

// Error handling
$err = $client->getError();
if ($err) {
    echo "<h2>Constructor error</h2><pre>" . $err . "</pre>";
}

// Prepare payment details
$amount = "5000";  // amount in cents (e.g., 5000 = $50.00)
$currency = "usd";
$cardNumber = "4242424242424242";
$expMonth = "12";
$expYear = "2024";
$cvc = "123";

// Call the SOAP method
$result = $client->call("makePayment", array(
    "amount" => $amount,
    "currency" => $currency,
    "cardNumber" => $cardNumber,
    "expMonth" => $expMonth,
    "expYear" => $expYear,
    "cvc" => $cvc
));

// Check for a fault
if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
} else {
    // Check for errors
    $err = $client->getError();
    if ($err) {
        echo "<h2>Error</h2><pre>" . $err . "</pre>";
    } else {
        // Display the result
        echo "<h2>Payment Result</h2><pre>";
        print_r($result);
        echo "</pre>";
    }
}
?>
