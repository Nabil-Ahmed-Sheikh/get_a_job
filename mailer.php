 <?php require_once('includes/initialize.php'); ?>
 <?php 
// if(!($session->is_logged_in() && $session->is_admin())){redirect_to('login.php');}
?>
 <?php
if(isset($_POST['submit'])) {
    if($_POST['sender'] == '' || $_POST['senderName'] == '' || $_POST['receiver'] == '' || 
        $_POST['receiverName'] == '' || $_POST['subject'] == '' || $_POST['body'] == '') {
            
            $session->message('Something Went Wrong.');
            redirect_to('../company/shortlist.php');
    }

    $sender = $_POST['sender'];
    $senderName = $_POST['senderName'];
    $receiver = $_POST['receiver'];
    $receiverName = $_POST['receiverName'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];
}
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'get.a.job.mailer@gmail.com';                     // SMTP username
    $mail->Password   = 'rakib@123';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($sender, $senderName);
    $mail->addAddress($receiver, $receiverName);     // Add a recipient\
    $mail->addReplyTo($sender, $senderName);

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    $session->message('Email Sent');
    redirect_to('company/shortlist.php');
} catch (Exception $e) {
    $session->message("Message could not be sent");
    redirect_to('company/shortlist.php');
}


?>