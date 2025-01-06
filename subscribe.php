<?php
// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer files (if manually installed)
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
ob_start();
// Start processing
try {
    // Sanitize and validate email input
    if (!isset($_REQUEST['email']) || empty($_REQUEST['email'])) {
        throw new Exception('Email is required.');
    }
    
    $from = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($from, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email format.');
    }

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'vidyasagar@vsdev.in';
    $mail->Password = 'Sagar@837400';
    $mail->SMTPSecure = 'tls';
    $mail->SMTPDebug = 0;
    $mail->Port = 587;              // Mailtrap password

    // Recipients
    $mail->setFrom('vidyasagar@vsdev.in', 'Your Name');  // Sender's email and name
    $mail->addAddress('vidyasagar@vsdev.in', 'Recipient Name'); // Add recipient

    // Email content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'New Subscription Notification';
    $mail->Body    = 'New subscriber information: <br>Email: ' . $from;
    $mail->AltBody = 'New subscriber information: Email: ' . $from; // Plain text alternative

    // Send the email
    $mail->send();
    ob_clean();
    // Respond with a success message
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'message' => 'Subscription email sent successfully.']);

} catch (Exception $e) {
    ob_clean();
    // Handle errors and respond with error details
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
