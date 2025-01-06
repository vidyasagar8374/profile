<?php
// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// require '../vendor/autoload.php';
// Load PHPMailer files (if manually installed)
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
ob_start();
try {
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $subject = $_REQUEST['subject'];
    // $number = $_REQUEST['number'];
    $cmessage = $_REQUEST['message'];
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'vidyasagar@vsdev.in';
    $mail->Password = 'Sagar@837400';
    $mail->SMTPSecure = 'tls';
    $mail->SMTPDebug = 0;
    $mail->Port = 587;



    // Recipients
    $mail->setFrom('vidyasagar@vsdev.in', 'Your Name');  // Sender's email and name
    $mail->addAddress('vidyasagar@vsdev.in', 'Recipient Name'); // Add recipient
    // Email content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = 'Hi I am' .$name . '<br>' . 'Email : ' . $from . '<br>' . 'Subject : ' . $subject . '<br>' . 'Message : '. $cmessage ; // HTML content
    $mail->AltBody = 'Hello, this is a test email!';      // Plain text alternative
    // Send the email
    $mail->send();
    ob_clean();
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'message' => 'Email sent successfully.']);
} catch (Exception $e) {
    ob_clean();
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Mailer Error: ' . $mail->ErrorInfo]);
}
?>
