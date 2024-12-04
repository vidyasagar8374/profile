<?php
// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer files (if manually installed)
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

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
    $mail->isSMTP();                                      // Use SMTP
    $mail->Host       = 'sandbox.smtp.mailtrap.io';        // Mailtrap SMTP server
    $mail->SMTPAuth   = true;                             // Enable SMTP authentication
    $mail->Port       = 2525;                             // TCP port for Mailtrap
    $mail->Username   = 'ea2b03bf50f93c';                 // Mailtrap username
    $mail->Password   = '8a7964c9b0ccb4';                 // Mailtrap password

    // Recipients
    $mail->setFrom('your-email@gmail.com', 'Your Name');  // Sender's email and name
    $mail->addAddress('recipient@example.com', 'Recipient Name'); // Add recipient

    // Email content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'New Subscription Notification';
    $mail->Body    = 'New subscriber information: <br>Email: ' . $from;
    $mail->AltBody = 'New subscriber information: Email: ' . $from; // Plain text alternative

    // Send the email
    $mail->send();

    // Respond with a success message
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'message' => 'Subscription email sent successfully.']);

} catch (Exception $e) {
    // Handle errors and respond with error details
    header('Content-Type: application/json', true, 500);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
