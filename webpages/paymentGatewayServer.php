<?php
//Tried using cURL but could not enable it so 
//we used file_get_contents() with the http stream wrapper to make HTTP requests.


// PayPal sandbox API endpoint for OAuth and payment
$oauth_url = "https://api-m.sandbox.paypal.com/v1/oauth2/token";
$payment_url = "https://api-m.sandbox.paypal.com/v1/payments/payment";

// Your PayPal client ID and secret
$client_id = "AQBIDAQAAV-OQ9di_soII8SjHyDNxiWYXcZ5jahuE0yC6ViYuOThoXwRUnsA--PFB00eMCSkhatG8ThV";
$client_secret = "EJ38ZUGJmZXezS7JhbF92zoaowsZwE-tOl-XRdJPqR1XFWMpRHEzwr-wGVclZ3wlHkc-NXnQhjJXV0SY";

// Step 1: Get the access token from PayPal
$auth = base64_encode("$client_id:$client_secret");
$options = [
    'http' => [
        'header'  => "Authorization: Basic $auth\r\nContent-Type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => "grant_type=client_credentials",
    ],
];
$context  = stream_context_create($options);
$response = file_get_contents($oauth_url, false, $context);
if ($response === FALSE) die("Error: No response.");
$json_response = json_decode($response);

$access_token = $json_response->access_token;

// Step 2: Create a payment request
$amount = $_POST['amount']; // Amount passed from the cart
$payment_data = json_encode([
    "intent" => "sale",
    "redirect_urls" => [
        "return_url" => "http://127.0.0.1:8080/Gamebear/webpages/success.php",
        "cancel_url" => "http://127.0.0.1:8080/Gamebear/webpages/cancel.php"
    ],
    "payer" => [
        "payment_method" => "paypal"
    ],
    "transactions" => [[
        "amount" => [
            "total" => $amount,
            "currency" => "USD"
        ],
        "description" => "Purchase from your store."
    ]]
]);

$options = [
    'http' => [
        'header'  => "Authorization: Bearer $access_token\r\nContent-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => $payment_data,
    ],
];
$context  = stream_context_create($options);
$payment_response = file_get_contents($payment_url, false, $context);
if ($payment_response === FALSE) die("Error: No response.");
$payment = json_decode($payment_response);

// Step 3: Send back approval link for redirect
foreach ($payment->links as $link) {
    if ($link->rel == 'approval_url') {
        $approval_url = $link->href;
        break;
    }
}

if (!empty($approval_url)) {
    echo json_encode(['status' => 'success', 'approval_url' => $approval_url]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Unable to create PayPal payment.']);
}
?>
