<?php
session_start();

// Check if payment was successful by looking at the payment details (if available).
if (isset($_GET['paymentId']) && isset($_GET['PayerID'])) {
    $paymentId = $_GET['paymentId'];
    $payerId = $_GET['PayerID'];

    // Here you can fetch transaction details from PayPal's API using the paymentId
    // You can also save these details to your database
    echo "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                color: #333;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .container {
                background-color: #fff;
                padding: 30px;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                text-align: center;
                max-width: 600px;
                width: 100%;
            }
            h1 {
                color: #4CAF50;
            }
            p {
                font-size: 16px;
                line-height: 1.6;
            }
            .btn {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }
            .btn:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>Payment Successful!</h1>
            <p>Thank you for your purchase. Your payment was successful.</p>
            <p>Payment ID: " . htmlspecialchars($paymentId) . "</p>
            <p>Payer ID: " . htmlspecialchars($payerId) . "</p>
            <a href='store.php' class='btn'>Return to Store</a>
        </div>
    </body>
    </html>
    ";
} else {
    echo "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                color: #333;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .container {
                background-color: #fff;
                padding: 30px;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                text-align: center;
                max-width: 600px;
                width: 100%;
            }
            h1 {
                color: #f44336;
            }
            p {
                font-size: 16px;
                line-height: 1.6;
            }
            .btn {
                display: inline-block;
                margin-top: 20px;
                padding: 10px 20px;
                background-color: #f44336;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }
            .btn:hover {
                background-color: #e53935;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>Payment Error</h1>
            <p>There was an error processing your payment.</p>
            <a href='store.php' class='btn'>Return to Store</a>
        </div>
    </body>
    </html>
    ";
}
?>
