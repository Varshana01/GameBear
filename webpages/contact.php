<?php
require_once('lib/nusoap.php');
require_once('../PHPMailer/src/PHPMailer.php');
require_once('../PHPMailer/src/SMTP.php');
require_once('../PHPMailer/src/Exception.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create a new nusoap server instance
$server = new nusoap_server();

// Function to handle form submission via the web service
function sendMessage($username, $email, $message)
{
    if (empty($username) || empty($email) || empty($message)) {
        return "All fields are required!";
    }

    $mail = new PHPMailer();
    try {
    // Configure SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'spamvarsh@gmail.com'; // Your email
    $mail->Password = 'pvqq xllb yrnu qcqg'; // Your email password
    $mail->SMTPSecure = 'ssl';// Use STARTssl
    $mail->Port = 465; // Port for ssl

    $mail->setFrom('noreply@gmail.com', 'GameBear'); // Sender info
    $mail->addAddress('spamvarsh@gmail.com'); // Recipient email
    $mail->addReplyTo($email, $username); // Reply-To address
    
    // Email content
    $mail->isHTML(true); // Set email format to plain text
    $mail->Subject = "New Contact Us Message ";
    $mail->Body    = "You have received a new message from $username.\n\n".
                    "Email: $email\n".
                    "Message: \n$message\n\n".
                    "Regards,\nGameBear";

    $mail->send();
        echo "Mail has been sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error";
    }
}

// Configure WSDL for the service
$server->configureWSDL("ContactService", "urn:ContactService");

// Register the 'sendMessage' function to be exposed as a web service
$server->register(
    "sendMessage",
    array(
        'username' => 'xsd:string',
        'email' => 'xsd:string',
        'message' => 'xsd:string'
    ),
    array('return' => 'xsd:string'),
    'urn:ContactService',
    'urn:ContactService#sendMessage',
    'rpc',
    'encoded',
    'Send a message through the contact form'
);

// Ensure PHP listens for POST data
$HTTP_RAW_POST_DATA = file_get_contents("php://input");
$server->service($HTTP_RAW_POST_DATA);
?>
