<?php
// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer files (if manually installed)
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

try {
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $subject = $_REQUEST['subject'];
    // $number = $_REQUEST['number'];
    $cmessage = $_REQUEST['message'];
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    // Server settings
    $mail->isSMTP();                                      // Use SMTP
    $mail->Host       = 'vsdev.in';        // Mailtrap SMTP server
    $mail->SMTPAuth   = true;                             // Enable SMTP authentication
    $mail->Port       = 587;                             // TCP port for Mailtrap
    $mail->Username   = 'vidyasagar@vsdev.in';                 // Mailtrap username
    $mail->Password   = 'Sagar@837400';                 // Mailtrap password
    // Recipients
    $mail->setFrom('your-email@gmail.com', 'Your Name');  // Sender's email and name
    $mail->addAddress('recipient@example.com', 'Recipient Name'); // Add recipient
    // Email content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = 'Hi I am' .$name . '<br>' . 'Email : ' . $from . '<br>' . 'Subject : ' . $subject . '<br>' . 'Message : '. $cmessage ; // HTML content
    $mail->AltBody = 'Hello, this is a test email!';      // Plain text alternative
    // Send the email
    $mail->send();
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'message' => 'Email sent successfully.']);
} catch (Exception $e) {
    header('Content-Type: application/json', true, 500);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>
